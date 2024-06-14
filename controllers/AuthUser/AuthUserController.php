<?php

namespace app\controllers\AuthUser;

use app\models\TokenUser;
use app\models\User;
use app\models\Token;
use Yii;
use yii\rest\Controller;

class AuthUserController extends Controller
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

        $user = User::findByUsername($username);
        if (!$user) {
            return ['error' => 'Нет такого пользователя!'];
        }

        if (!$user->validatePassword($password)) {
            return ['error' => 'Неверный пароль!'];
        }

        $accessToken = Yii::$app->security->generateRandomString();
        $token = TokenUser::generateToken($username, md5($password), $accessToken);

        return ['token' => $accessToken];
    }
    public function actionRegister(): array
    {
        $request = Yii::$app->getRequest();
        $username = $request->getBodyParam('username');
        $password = $request->getBodyParam('password');

        if (User::findByUsername($username)) {
            return ['error' => 'Пользователь с таким именем уже существует!'];
        }

        $user = new User();
        $user->username = $username;
        $user->password = Yii::$app->security->generatePasswordHash($password);

        if ($user->save()) {
            $accessToken = Yii::$app->security->generateRandomString();
            $token = TokenUser::generateToken($username, md5($password), $accessToken);
            return ['token' => $accessToken];
        }

        return ['error' => 'Не удалось зарегистрировать пользователя.'];
    }
}
