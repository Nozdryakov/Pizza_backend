<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m220920_124413_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'username'=>$this->string(),
            'password'=>$this->string(),
            'authKey'=>$this->string(),
            'accessToken'=>$this->string(),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
