<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%stocks}}`.
 */
class m220920_124536_create_stocks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%stocks}}', [
            'id' => $this->primaryKey(),
            'image' => $this->string(120)->Null(),
            'title' => $this->string(30)->notNull(),
            'description' => $this->string(90)->notNull(),
            'price' => $this->decimal()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%stocks}}');
    }
}
