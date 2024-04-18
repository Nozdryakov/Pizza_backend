<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m220919_163445_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'product_id' => $this->primaryKey(),
            'image' => $this->string(600)->Null(),
            'title' => $this->string(90)->notNull(),
            'description' => $this->string(600)->notNull(),
            'price' => $this->decimal(5,2)->notNull(),
            'num_of_orders' => $this->integer()->unsigned()->null(),
            'category_id' => $this->integer()->notNull(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
