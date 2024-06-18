<?php
namespace app\models;

use Yii;
use yii\base\Exception;
use yii\db\ActiveRecord;

/**
 * @property mixed|string|null $authKey
 * @property string|null $userName
 * @property mixed|null $accessToken
 * @property mixed|null $token
 * @property mixed|null $email
 * @property mixed|null $password
 */
class TokenUser extends ActiveRecord
{
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @throws Exception
     */
    public static function generateToken($email, $password, $accessToken)
    {
        $token = new self();
        $token->email = $email;
        $token->password = $password;
        $token->authKey = Yii::$app->security->generateRandomString();
        $token->accessToken = $accessToken;
        $token->save();

        return $token->authKey;
    }
}
