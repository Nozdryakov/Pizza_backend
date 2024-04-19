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
            'popular_id' => $this->primaryKey(),
            'image' => $this->string(120)->Null(),
            'product_id' => $this->integer()->notNull()->unique(),
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
