<?php
namespace app\models;

use Yii;
use yii\base\Exception;
use yii\db\ActiveRecord;

/**
 * @property mixed|string|null $authKey
 * @property mixed|null $accessToken
 * @property mixed|null $token
 * @property mixed|null $username
 * @property mixed|null $password
 * @property integer $role
 */
class Token extends ActiveRecord
{
    public static function tableName()
    {
        return 'admins';
    }

    /**
     * @throws Exception
     */
    public static function generateToken($username, $password, $accessToken)
    {
        $token = new self();
        $token->username = $username;
        $token->password = $password;
        $token->authKey = Yii::$app->security->generateRandomString();
        $token->accessToken = $accessToken;
        $token->save();

        return $token->authKey;
    }
}
