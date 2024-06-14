<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%address}}`.
 */
class m240612_151633_create_address_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%address}}', [
            'address_id' => $this->primaryKey(),
            'title' => $this->string(),
            'user_id' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%address}}');
    }
}
