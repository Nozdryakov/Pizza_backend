<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%popular}}`.
 */
class m220920_124511_create_popular_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%popular}}', [
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
        $this->dropTable('{{%popular}}');
    }
}
