<?php

use yii\db\Migration;

/**
 * Class m240618_234708_create_relation_ships_file
 */
class m240618_234708_create_relation_ships_file extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'cat-id-categories',
            'product',
            'category_id',
            'categories',
            'category_id',
            'CASCADE',
        );

        $this->addForeignKey(
            'fk-popular-product',
            'popular',
            'product_id',
            'product',
            'product_id',
            'CASCADE',
        );

        $this->addForeignKey(
            'fk-stocks-product',
            'stocks',
            'product_id',
            'product',
            'product_id',
            'CASCADE',
        );
        $this->addForeignKey(
            'fk-orders-user',
            'orders',
            'user_id',
            'users',
            'user_id',
            'CASCADE',
        );
        $this->addForeignKey(
            'fk-address-user',
            'address',
            'user_id',
            'users',
            'user_id',
            'CASCADE',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Удаляем внешний ключ из таблицы product
        $this->dropForeignKey('cat-id-categories', 'product');

        // Удаляем внешний ключ из таблицы popular
        $this->dropForeignKey('fk-popular-product', 'popular');

        // Удаляем внешний ключ из таблицы stocks
        $this->dropForeignKey('fk-stocks-product', 'stocks');
    }

}
