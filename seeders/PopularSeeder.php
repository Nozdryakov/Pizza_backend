<?php

namespace app\seeders;

use Yii;

class PopularSeeder {
    private array $fields = [
        'title' => 'pizza',
        'description' =>'description',
        'price' => '21.00',
    ];
    public function up() {
        Yii::$app->db->createCommand()->insert('popular', $this->fields)->execute();
    }

    public function down() {
        Yii::$app->db->createCommand()->delete('popular', $this->fields)->execute();
    }
}