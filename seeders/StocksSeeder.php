<?php

namespace app\seeders;

use Yii;

class StocksSeeder {
    private array $fields = [
        [
            'image' => 'stocks-1.jpg',
            'discount' => '10',
            'product_id' => 1,
        ],
        [
            'image' => 'stocks-2.jpg',
            'discount' => '30',
            'product_id' => 2,
        ],
        [
            'image' => 'stocks-3.jpg',
            'discount' => '5',
            'product_id' => 3,
        ],
        [
            'image' => 'stocks-4.jpg',
            'discount' => '5',
            'product_id' => 4,
        ],
        [
            'image' => 'stocks-5.jpg',
            'discount' => '50',
            'product_id' => 5,
        ],
        [
            'image' => 'stocks-6.jpg',
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