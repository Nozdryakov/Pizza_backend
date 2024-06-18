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
        $email = $request->getBodyParam('email');
        $password = $request->getBodyParam('password');

        // Валидация данных
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            Yii::$app->response->statusCode = 400;
            return ['error' => 'Неверный формат email!'];
        }

        $user = User::findByEmail($email);
        if (!$user) {
            Yii::$app->response->statusCode = 404;
            return ['error' => 'Нет такого пользователя!'];
        }

        if (!$user->validatePassword($password)) {
            Yii::$app->response->statusCode = 401;
            return ['error' => 'Неверный пароль!'];
        }

        $accessToken = Yii::$app->security->generateRandomString();
        $token = TokenUser::generateToken($email, hash('sha256', $password), $accessToken);
        return ['token' => $accessToken, 'user_id' => $user->user_id];
    }

    public function actionRegister(): array
    {
        $request = Yii::$app->getRequest();
        $email = $request->getBodyParam('email');
        $password = $request->getBodyParam('password');

        // Валидация данных
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            Yii::$app->response->statusCode = 400;
            return ['error' => 'Неверный формат email!'];
        }

        if (User::findByEmail($email)) {
            Yii::$app->response->statusCode = 409;
            return ['error' => 'Пользователь с таким именем уже существует!'];
        }

        $user = new User();
        $user->email = $email;
        $user->password = Yii::$app->security->generatePasswordHash($password);

        if ($user->save()) {
            $accessToken = Yii::$app->security->generateRandomString();
            $token = TokenUser::generateToken($email, hash('sha256', $password), $accessToken);
            return ['token' => $accessToken, 'user_id' => $user->user_id];
        }

        Yii::$app->response->statusCode = 500;
        return ['error' => 'Не удалось зарегистрировать пользователя.'];
    }



}
