<?php

namespace app\seeders;

use Yii;

class ProductSeeder {
    private array $items = [
        [
            'image' => 'product-1.jpg',
            'title' => 'Чікен Бомбоні',
            'description' => 'Курячі шматочки, солодкий перець, моцарела, червона цибуля, соус солодкий чилі, соус альфредо',
            'price' => 20,
            'visible' => 1,
            'category_id' => 1,
        ],
        [
            'image' => 'product-2.jpg',
            'title' => 'Домашня',
            'description' => 'Курячі шматочки, солодкий перець, моцарела, червона цибуля, соус солодкий чилі, соус альфредо',
            'price' => 25,
            'visible' => 1,
            'category_id' => 1,
        ],
        [
            'image' => 'product-3.jpg',
            'title' => 'Ранч Барбекю',
            'description' => 'Курячі шматочки, солодкий перець, червона цибуля, ковбаски',
            'price' => 23,
            'visible' => 1,
            'category_id' => 1,
        ],
        [
            'image' => 'product-4.jpg',
            'title' => 'Чікен Роллі',
            'description' => 'Курячі шматочки, солодкий перець, моцарела, червона цибуля, соус солодкий чилі, соус альфредо',
            'price' => 26,
            'visible' => 1,
            'category_id' => 1,
        ],
        [
            'image' => 'product-5.jpg',
            'title' => 'Барбекю Нью',
            'description' => 'Курячі шматочки, солодкий перець, моцарела, червона цибуля, соус солодкий чилі, соус альфредо',
            'price' => 21,
            'visible' => 1,
            'category_id' => 1,
        ],
        [
            'image' => 'product-6.jpg',
            'title' => 'Селянська',
            'description' => 'Курячі шматочки, солодкий перець, моцарела, червона цибуля, соус солодкий чилі, соус альфредо, огірочки, цибуля',
            'price' => 24,
            'visible' => 1,
            'category_id' => 1,
        ],
        [
            'image' => 'product-7.jpg',
            'title' => '8 половинок',
            'description' => 'Курячі шматочки, солодкий перець, червона цибуля, ковбаски, перець, сир Пармезан',
            'price' => 28,
            'visible' => 1,
            'category_id' => 1,
        ],
        [
            'image' => 'product-8.jpg',
            'title' => 'Італійська',
            'description' => 'Курячі шматочки, солодкий перець, моцарела, червона цибуля, соус солодкий чилі, соус альфредо',
            'price' => 18,
            'visible' => 1,
            'category_id' => 1,
        ],
        // Закуски
        [
            'image' => 'zakuska-1.jpg',
            'title' => 'Курячі шматочки',
            'description' => 'Курячі шматочки, солодкий перець, моцарела, червона цибуля, соус солодкий чилі, соус альфредо',
            'price' => 100,
            'visible' => 1,
            'category_id' => 2,
        ],
        [
            'image' => 'zakuska-2.jpg',
            'title' => 'Закуска Лечо',
            'description' => 'Курячі шматочки, солодкий перець, моцарела, червона цибуля, соус солодкий чилі, соус альфредо',
            'price' => 86,
            'visible' => 1,
            'category_id' => 2,
        ],
        [
            'image' => 'zakuska-3.jpg',
            'title' => 'Грибна закуска',
            'description' => 'Курячі шматочки, солодкий перець, червона цибуля, ковбаски',
            'price' => 77,
            'visible' => 1,
            'category_id' => 2,
        ],
        [
            'image' => 'zakuska-4.jpg',
            'title' => 'Деруни',
            'description' => 'Курячі шматочки, солодкий перець, моцарела, червона цибуля, соус солодкий чилі, соус альфредо',
            'price' => 90,
            'visible' => 1,
            'category_id' => 2,
        ],
        [
            'image' => 'zakuska-5.jpg',
            'title' => 'Паста Карбонара',
            'description' => 'Курячі шматочки, солодкий перець, моцарела, червона цибуля, соус солодкий чилі, соус альфредо',
            'price' => 120,
            'visible' => 1,
            'category_id' => 2,
        ],
        [
            'image' => 'zakuska-6.jpg',
            'title' => 'Картопля Фрі',
            'description' => 'Хрустка картопля фрі з зеленим лучком',
            'price' => 50,
            'visible' => 1,
            'category_id' => 2,
        ],
        // Десерти
        [
            'image' => 'des-1.jpg',
            'title' => 'Маффіни Шоко',
            'description' => 'Надзвичайні шоколадні маффіни з шматочками ананаса',
            'price' => 80,
            'visible' => 1,
            'category_id' => 3,
        ],
        [
            'image' => 'des-2.jpg',
            'title' => 'Чиз вишневий',
            'description' => 'Смачний вишневий чизкейк, приготований за всіма стандартами кулінарії',
            'price' => 90,
            'visible' => 1,
            'category_id' => 3,
        ],
        [
            'image' => 'des-3.jpg',
            'title' => 'Сирники з малиною',
            'description' => 'Малинові сирники за рецептом наших бабусь',
            'price' => 85,
            'visible' => 1,
            'category_id' => 3,
        ],
        [
            'image' => 'des-4.jpg',
            'title' => 'Сирники',
            'description' => 'Стандартні сирники за рецептом багаторічних традицій',
            'price' => 75,
            'visible' => 1,
            'category_id' => 3,
        ],
        // Напої
        [
            'image' => 'nap-1.jpg',
            'title' => 'Pepsi',
            'description' => 'Надзвичайні шоколадні маффіни з шматочками ананаса',
            'price' => 80,
            'visible' => 1,
            'category_id' => 4,
        ],
        [
            'image' => 'nap-2.jpg',
            'title' => 'Mirinda',
            'description' => 'Смачний вишневий чизкейк, приготований за всіма стандартами кулінарії',
            'price' => 50,
            'visible' => 1,
            'category_id' => 4,
        ],
        [
            'image' => 'nap-3.jpg',
            'title' => 'Aqua Water',
            'description' => 'Малинові сирники за рецептом наших бабусь',
            'price' => 35,
            'visible' => 1,
            'category_id' => 4,
        ],
        [
            'image' => 'nap-4.jpg',
            'title' => 'Сік',
            'description' => 'Стандартні сирники за рецептом багаторічних традицій',
            'price' => 65,
            'visible' => 1,
            'category_id' => 4,
        ],
        // Комбо
        [
            'image' => 'combo-1.jpg',
            'title' => 'Шаурма Класик+Топ',
            'description' => 'Надзвичайні шоколадні маффіни з шматочками ананаса',
            'price' => 160,
            'visible' => 1,
            'category_id' => 5,
        ],
        [
            'image' => 'combo-2.jpg',
            'title' => 'Сирний соус',
            'description' => 'Смачний соус',
            'price' => 100,
            'visible' => 1,
            'category_id' => 5,
        ],
        [
            'image' => 'combo-3.jpg',
            'title' => 'Сік + Аква',
            'description' => 'Сік і вода',
            'price' => 95,
            'visible' => 1,
            'category_id' => 5,
        ],
        [
            'image' => '',
            'title' => 'Друга шаурма у подарунок',
            'description' => 'акція',
            'price' => 170,
            'visible' => 0,
            'category_id' => 5,
        ]
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
