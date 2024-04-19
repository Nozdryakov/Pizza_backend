<?php

namespace app\seeders;

use Yii;

class StocksSeeder {
    private array $fields = [
        [
            'image' => '/path',
            'discount' => '10',
            'product_id' => 1,
        ],
        [
            'image' => '/path',
            'discount' => '30',
            'product_id' => 2,
        ],
        [
            'image' => '/path',
            'discount' => '5',
            'product_id' => 3,
        ],
        [
            'image' => '/path',
            'discount' => '5',
            'product_id' => 4,
        ],
        [
            'image' => '/path',
            'discount' => '50',
            'product_id' => 5,
        ],
        [
            'image' => '/path',
            'discount' => '10',
            'product_id' => 6,
        ],
    ];

    public function up() {
        foreach ($this->fields as $item) {
            Yii::$app->db->createCommand()->insert('stocks', $item)->execute();
        }
    }

    public function down() {
        Yii::$app->db->createCommand()->delete('stocks')->execute();
    }
}