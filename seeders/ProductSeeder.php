<?php

namespace app\seeders;

use Yii;

class ProductSeeder {
    private array $fields = [
        'title' => 'pizza',
        'description' =>'description',
        'price' => '21.00',
    ];
    public function up() {
        Yii::$app->db->createCommand()->insert('product', $this->fields)->execute();
    }

    public function down() {
        Yii::$app->db->createCommand()->delete('product', $this->fields)->execute();
    }
}