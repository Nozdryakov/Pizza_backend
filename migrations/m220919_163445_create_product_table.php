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
            'price' => $this->decimal(7,2)->notNull(),
            'visible' => $this->tinyInteger(1)->defaultValue(0)->notNull(),
            'category_id' => $this->integer()->notNull(),
            'num_of_orders' => $this->integer(),
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
