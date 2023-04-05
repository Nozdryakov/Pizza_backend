<?php

namespace app\seeders;

use Yii;

class StocksSeeder {
    private array $fields = [
        'title' => 'pizza',
        'description' =>'description',
        'price' => '21.00',
    ];
    public function up() {
        Yii::$app->db->createCommand()->insert('stocks', $this->fields)->execute();
    }

    public function down() {
        Yii::$app->db->createCommand()->delete('stocks', $this->fields)->execute();
    }
}