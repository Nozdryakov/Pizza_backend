<?php

namespace app\seeders;

use Yii;


class CategoriesSeeder {
    private array $fields = [
        'title' => 'pizza',
    ];
    public function up() {
        for ($i = 1; $i <= 30; $i++) {
            Yii::$app->db->createCommand()->insert('categories', $this->fields)->execute();
        }
    }

    public function down() {
        for ($i = 1; $i <= 30; $i++) {
            Yii::$app->db->createCommand()->delete('categories', $this->fields)->execute();
        }
    }
}