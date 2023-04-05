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
            'id' => $this->primaryKey(),
            'image' => $this->string(120)->Null(),
            'title' => $this->string(30)->notNull(),
            'description' => $this->string(90)->notNull(),
            'price' => $this->decimal()->notNull(),
            'category_id' => $this->integer()->null(),
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
