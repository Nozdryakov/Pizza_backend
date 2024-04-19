<?php

namespace app\seeders;

use Yii;

class SuperAdminSeeder {
    private array $fieldsSuperAdmin = [
        'username' => 'admin',
        'password' => 'admin',
        'authKey'  => 'auth-admin',
        'accessToken' => 'token-admin',
    ];

    public function up() {
        Yii::$app->db->createCommand()->insert('users', $this->fieldsSuperAdmin)->execute();
    }

    public function down() {
        Yii::$app->db->createCommand()->delete('users')->execute();
    }
}