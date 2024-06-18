<?php

namespace app\seeders;

use Yii;

class AreasSeeder {
    private array $fields = [
        [
            'title' => 'Голосіївський',
            'count' => 211,
        ],
        [
            'title' => 'Дарницький',
            'count' => 365,
        ],
        [
            'title' => 'Деснянський',
            'count' => 475,
        ],
        [
            'title' => 'Дніпровський',
            'count' => 398,
        ],
        [
            'title' => 'Оболонський',
            'count' => 287,
        ],
        [
            'title' => 'Печерський',
            'count' => 154,
        ],
        [
            'title' => 'Подільський',
            'count' => 193,
        ],
        [
            'title' => 'Святошинський',
            'count' => 451,
        ],
        [
            'title' => "Солом'янський",
            'count' => 322,
        ],
        [
            'title' => 'Шевченківський',
            'count' => 89,
        ],
    ];

    public function up() {
        foreach ($this->fields as $item) {
            Yii::$app->db->createCommand()->insert('areas', $item)->execute();
        }
    }

    public function down() {
        Yii::$app->db->createCommand()->delete('areas')->execute();
    }
}