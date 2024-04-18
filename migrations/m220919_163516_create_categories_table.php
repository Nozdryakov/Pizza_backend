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
            'category_id' => $this->primaryKey(),
            'title' => $this->string(80)->notNull(),
        ]);

        $this->addForeignKey(
            'cat-id-categories',
            'product',
            'category_id',
            'categories',
            'category_id',
            'CASCADE',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'cat-id-categories',
            'product'
        );
        $this->dropTable('{{%categories}}');
    }
}
