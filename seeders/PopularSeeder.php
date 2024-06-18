<?php

namespace app\seeders;

use Yii;

class PopularSeeder {
    private array $fields = [
        [
            'image' => '05.jpg',
            'product_id' => 2,
        ],
        [
            'image' => '03.jpg',
            'product_id' => 5,
        ],
        [
            'image' => '02.jpg',
            'product_id' => 12,
        ],
        [
            'image' => '01.jpg',
            'product_id' => 6,
        ],
    ];

    public function up() {
        foreach ($this->fields as $item) {
            Yii::$app->db->createCommand()->insert('popular', $item)->execute();
        }
    }

    public function down() {
        Yii::$app->db->createCommand()->delete('popular')->execute();
    }
}