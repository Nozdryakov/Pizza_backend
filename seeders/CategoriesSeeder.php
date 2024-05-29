<?php

namespace app\seeders;

use Yii;

class CategoriesSeeder {
    private array $categories = [
        'Піца',
        'Закуски',
        'Десерти',
        'Напої',
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
