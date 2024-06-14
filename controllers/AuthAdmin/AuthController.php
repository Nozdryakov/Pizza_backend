<?php
namespace app\controllers\AuthAdmin;
use app\models\Admin;
use app\models\Token;
use Yii;
use yii\rest\Controller;

class AuthController extends Controller
{
    public function behaviors(): array
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['except'] = ['login'];
        return $behaviors;
    }
    public function actionLogin(): array
    {
        $request = Yii::$app->getRequest();
        $username = $request->getBodyParam('username');
        $password = $request->getBodyParam('password');

        $user = Admin::findByUsername($username);
        if (!$user) {
            return ['error' => 'Нет такого пользователя!'];
        }

        if (!$user->validatePassword($password)) {
            return ['error' => 'Неверный пароль!'];
        }

        $accessToken = Yii::$app->security->generateRandomString();
        $token = Token::generateToken($username, md5($password), $accessToken);

        return ['token' => $accessToken];
    }

}