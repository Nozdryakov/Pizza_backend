<?php

namespace app\seeders;

use Yii;

class CategoriesSeeder {
    private array $categories = [
        'Пицца',
        'Закуски',
        'Десерты',
        'Напитки',
        'Комбо',
    ];

    public function up() {
        foreach ($this->categories as $category) {
            Yii::$app->db->createCommand()->insert('categories', ['title' => $category])->execute();
        }
    }

    public function down() {
        Yii::$app->db->createCommand()->delete('categories')->execute();
    }
}
