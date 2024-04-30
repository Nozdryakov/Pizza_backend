<?php

namespace app\seeders;

use Yii;

class ProductSeeder {
    private array $items = [
        [
            'image' => 'product-1.jpg',
            'title' => 'Чикен Бомбони',
            'description' => 'Куриные кусочки, сладкий перец, моцарелла, красный лук, соус сладкий чили, соус альфре',
            'price' => 20,
            'num_of_orders' => 20,
            'category_id' => 1,
        ],
        [
            'image' => 'product-2.jpg',
            'title' => 'Домашняя',
            'description' => 'Куриные кусочки, сладкий перец, моцарелла, красный лук, соус сладкий чили, соус альфре',
            'price' => 25,
            'num_of_orders' => 20,
            'category_id' => 1,
        ],
        [
            'image' => 'product-3.jpg',
            'title' => 'Ранч Барбекю',
            'description' => 'Куриные кусочки, сладкий перец, красный лук, колбаски',
            'price' => 23,
            'num_of_orders' => 20,
            'category_id' => 1,
        ],
        [
            'image' => 'product-4.jpg',
            'title' => 'Чикен Ролли',
            'description' => 'Куриные кусочки, сладкий перец, моцарелла, красный лук, соус сладкий чили, соус альфре',
            'price' => 26,
            'num_of_orders' => 20,
            'category_id' => 1,
        ],
        [
            'image' => 'product-5.jpg',
            'title' => 'БарбекюНью',
            'description' => 'Куриные кусочки, сладкий перец, моцарелла, красный лук, соус сладкий чили, соус альфре',
            'price' => 21,
            'num_of_orders' => 20,
            'category_id' => 1,
        ],
        [
            'image' => 'product-6.jpg',
            'title' => 'Деревенская',
            'description' => 'Куриные кусочки, сладкий перец, моцарелла, красный лук, соус сладкий чили, соус альфре, огурчики, лук',
            'price' => 24,
            'num_of_orders' => 20,
            'category_id' => 1,
        ],
        [
            'image' => 'product-7.jpg',
            'title' => '8 половинок',
            'description' => 'Куриные кусочки, сладкий перец, красный лук, колбаски, перец, сыр Пармезан',
            'price' => 28,
            'num_of_orders' => 20,
            'category_id' => 1,
        ],
        [
            'image' => 'product-8.jpg',
            'title' => 'Итальянская',
            'description' => 'Куриные кусочки, сладкий перец, моцарелла, красный лук, соус сладкий чили, соус альфре',
            'price' => 18,
            'num_of_orders' => 20,
            'category_id' => 1,
        ],
//        =================== Закуски
        [
            'image' => 'zakuska-1.jpg',
            'title' => 'Куриные кусочки',
            'description' => 'Куриные кусочки, сладкий перец, моцарелла, красный лук, соус сладкий чили, соус альфре',
            'price' => 100,
            'num_of_orders' => 20,
            'category_id' => 2,
        ],
        [
            'image' => 'zakuska-2.jpg',
            'title' => 'Закуска Лечо',
            'description' => 'Куриные кусочки, сладкий перец, моцарелла, красный лук, соус сладкий чили, соус альфре',
            'price' => 86,
            'num_of_orders' => 20,
            'category_id' => 2,
        ],
        [
            'image' => 'zakuska-3.jpg',
            'title' => 'Грибная закуска',
            'description' => 'Куриные кусочки, сладкий перец, красный лук, колбаски',
            'price' => 77,
            'num_of_orders' => 20,
            'category_id' => 2,
        ],
        [
            'image' => 'zakuska-4.jpg',
            'title' => 'Драники',
            'description' => 'Куриные кусочки, сладкий перец, моцарелла, красный лук, соус сладкий чили, соус альфре',
            'price' => 90,
            'num_of_orders' => 20,
            'category_id' => 2,
        ],
        [
            'image' => 'zakuska-5.jpg',
            'title' => 'Паста Карбонара',
            'description' => 'Куриные кусочки, сладкий перец, моцарелла, красный лук, соус сладкий чили, соус альфре',
            'price' => 120,
            'num_of_orders' => 20,
            'category_id' => 2,
        ],
        [
            'image' => 'zakuska-6.jpg',
            'title' => 'Картофель Фри',
            'description' => 'Хрустящая картофели фри с зеленым лучком',
            'price' => 50,
            'num_of_orders' => 20,
            'category_id' => 2,
        ],
//      =============== Десерты
        [
            'image' => 'des-1.jpg',
            'title' => 'Маффины Шоко',
            'description' => 'Необычайные шоколадные маффины с кусочками ананаса',
            'price' => 80,
            'num_of_orders' => 20,
            'category_id' => 3,
        ],
        [
            'image' => 'des-2.jpg',
            'title' => 'Чиз вишневый',
            'description' => 'Вкусный вишневый чизкейк, приготовленный по всем стандартам кулинарии',
            'price' => 90,
            'num_of_orders' => 20,
            'category_id' => 3,
        ],
        [
            'image' => 'des-3.jpg',
            'title' => 'Сырники с малиной',
            'description' => 'Малиновые сырники по рецепту наших бабушек',
            'price' => 85,
            'num_of_orders' => 20,
            'category_id' => 3,
        ],
        [
            'image' => 'des-4.jpg',
            'title' => 'Сырники',
            'description' => 'Стандартные сырники по рецепту многолетних традиций',
            'price' => 75,
            'num_of_orders' => 20,
            'category_id' => 3,
        ],
//      ============ Напитки
        [

            'image' => 'nap-1.jpg',
            'title' => 'Pepsi',
            'description' => 'Необычайные шоколадные маффины с кусочками ананаса',
            'price' => 80,
            'num_of_orders' => 20,
            'category_id' => 4,
        ],
        [
            'image' => 'nap-2.jpg',
            'title' => 'Mirinda',
            'description' => 'Вкусный вишневый чизкейк, приготовленный по всем стандартам кулинарии',
            'price' => 50,
            'num_of_orders' => 20,
            'category_id' => 4,
        ],
        [
            'image' => 'nap-3.jpg',
            'title' => 'Aqua Water',
            'description' => 'Малиновые сырники по рецепту наших бабушек',
            'price' => 35,
            'num_of_orders' => 20,
            'category_id' => 4,
        ],
        [
            'image' => 'nap-4.jpg',
            'title' => 'Сок',
            'description' => 'Стандартные сырники по рецепту многолетних традиций',
            'price' => 65,
            'num_of_orders' => 20,
            'category_id' => 4,
        ],
        // Комбо
        [
            'image' => 'combo-1.jpg',
            'title' => 'Шаурма Классик+Топ',
            'description' => 'Необычайные шоколадные маффины с кусочками ананаса',
            'price' => 160,
            'num_of_orders' => 20,
            'category_id' => 5,
        ],
        [
            'image' => 'combo-2.jpg',
            'title' => 'Соус+Соус',
            'description' => 'Вкусный соус',
            'price' => 100,
            'num_of_orders' => 20,
            'category_id' => 5,
        ],
        [
            'image' => 'combo-3.jpg',
            'title' => 'Сок + Аква',
            'description' => 'Сок и вода',
            'price' => 95,
            'num_of_orders' => 20,
            'category_id' => 5,
        ],
    ];

    public function up() {
        foreach ($this->items as $item) {
            Yii::$app->db->createCommand()->insert('product', $item)->execute();
        }
    }

    public function down() {
        Yii::$app->db->createCommand()->delete('product')->execute();
    }
}
