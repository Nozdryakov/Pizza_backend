<?php

namespace app\seeders;

use Yii;

class SuperAdminSeeder {
    private array $fieldsSuperAdmin = [
        'username' => 'admin',
        'password' => 'admin',
        'authKey'  => 'auth-admin',
        'accessToken' => 'token-admin',
        'role' => 1
    ];

    public function up() {
        Yii::$app->db->createCommand()->insert('admins', $this->fieldsSuperAdmin)->execute();
    }

    public function down() {
        Yii::$app->db->createCommand()->delete('admins')->execute();
    }
}