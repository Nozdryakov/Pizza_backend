<?php
namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class Admin extends ActiveRecord implements IdentityInterface
{
    public static function tableName()
    {
        return 'admins';
    }

    public function fields()
    {
        return [
            'admin_id',
            'username',
        ];
    }
    public function attributeLabels()
    {
        return [
            'admin_id' => 'admin_id',
            'username' => 'username',
            'password' => 'password'
        ];
    }

    /**
     * Finds an identity by the given ID.
     *
     * @param string|int $admin_id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($admin_id)
    {
        return static::findOne($admin_id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['accessToken' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->admin_id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @param string $authKey
     * @return bool if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
    static public function findByUsername($username)
    {
        return Admin::findOne(['username' => $username]);
    }

    public function validatePassword($password) {
        return ($this->password == $password) ? true : false;
    }
}