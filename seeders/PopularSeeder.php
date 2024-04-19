<?php

namespace app\seeders;

use Yii;

class PopularSeeder {
    private array $fields = [
        [
            'image' => '/path',
            'product_id' => 6,
        ],
        [
            'image' => '/path',
            'product_id' => 10,
        ],
        [
            'image' => '/path',
            'product_id' => 11,
        ],
        [
            'image' => '/path',
            'product_id' => 1,
        ],
        [
            'image' => '/path',
            'product_id' => 2,
        ],
        [
            'image' => '/path',
            'product_id' => 3,
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