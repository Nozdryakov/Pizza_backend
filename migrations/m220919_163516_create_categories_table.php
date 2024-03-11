<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%categories}}`.
 */
class m220919_163516_create_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%categories}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(30)->notNull(),
        ]);

        // creates index for column `author_id`
        $this->createIndex(
            'idx-product_id',
            'product',
            'category_id'
        );

        $this->addForeignKey(
            'cat-id-categories',
            'product',
            'category_id',
            'categories',
            'id',
            'CASCADE',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%categories}}');
        $this->dropForeignKey(
            'cat-id-product',
            'product'
        );
    }
}
