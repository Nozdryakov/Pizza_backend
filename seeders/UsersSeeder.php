<?php

namespace app\seeders;

use Yii;
use Faker\Provider\ru_RU\Person;
use yii\db\Exception;

class UsersSeeder {
    private array $fieldsSuperAdmin = [
        'email' => 'user@mail.com',
        'password' => 'user',
        'authKey'  => 'auth-user',
        'accessToken' => 'token-user',
    ];

    public function up() {
        Yii::$app->db->createCommand()->insert('users', $this->fieldsSuperAdmin)->execute();
    }

    public function down() {
        Yii::$app->db->createCommand()->delete('users')->execute();
    }
}