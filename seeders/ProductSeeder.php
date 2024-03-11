<?php

namespace app\seeders;

use Yii;

class ProductSeeder {
    private array $items = [
        [
            'title' => 'Чикен Бомбони',
            'description' => 'Куриные кусочки, сладкий перец, моцарелла, красный лук, соус сладкий чили, соус альфре',
            'price' => 20,
            'category_id' => 1,
        ],
        [
            'title' => 'Домашняя',
            'description' => 'Куриные кусочки, сладкий перец, моцарелла, красный лук, соус сладкий чили, соус альфре',
            'price' => 25,
            'category_id' => 1,
        ],
        [
            'title' => 'Ранч Барбекю',
            'description' => 'Куриные кусочки, сладкий перец, красный лук, колбаски',
            'price' => 23,
            'category_id' => 1,
        ],
        [
            'title' => 'Чикен Ролли',
            'description' => 'Куриные кусочки, сладкий перец, моцарелла, красный лук, соус сладкий чили, соус альфре',
            'price' => 26,
            'category_id' => 1,
        ],
        [
            'title' => 'БарбекюНью',
            'description' => 'Куриные кусочки, сладкий перец, моцарелла, красный лук, соус сладкий чили, соус альфре',
            'price' => 21,
            'category_id' => 1,
        ],
        [
            'title' => 'Деревенская',
            'description' => 'Куриные кусочки, сладкий перец, моцарелла, красный лук, соус сладкий чили, соус альфре, огурчики, лук',
            'price' => 24,
            'category_id' => 1,
        ],
        [
            'title' => '8 половинок',
            'description' => 'Куриные кусочки, сладкий перец, красный лук, колбаски, перец, сыр Пармезан',
            'price' => 28,
            'category_id' => 1,
        ],
        [
            'title' => 'Итальянская',
            'description' => 'Куриные кусочки, сладкий перец, моцарелла, красный лук, соус сладкий чили, соус альфре',
            'price' => 18,
            'category_id' => 1,
        ],
    ];

    public function up() {
        foreach ($this->items as $item) {
            Yii::$app->db->createCommand()->insert('product', $item)->execute();
        }
    }

    public function down() {
        foreach ($this->items as $item) {
            Yii::$app->db->createCommand()->delete('product', $item)->execute();
        }
    }
}
