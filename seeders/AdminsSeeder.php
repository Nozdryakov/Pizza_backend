<?php

namespace app\seeders;

use Yii;
use Faker\Provider\ru_RU\Person;
use yii\db\Exception;

class AdminsSeeder {

    /**
     * @throws Exception
     */
    public function up() {
        for ($u = 0; $u <= 2; $u++) {
            $username = Person::firstNameMale();
            $password = Person::firstNameFemale();
            $authKey = 'auth-' . $username;
            $accessToken = 'token-' . $username;
            $fieldsFaker = [
                'username' => $username,
                'password' => $password,
                'authKey'  => $authKey,
                'accessToken' => $accessToken,
            ];
            Yii::$app->db->createCommand()->insert('admins', $fieldsFaker)->execute();
        }
    }

    public function down() {
        Yii::$app->db->createCommand()->delete('admins')->execute();
    }
}