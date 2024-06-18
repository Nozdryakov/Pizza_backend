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
            'user_id' => $this->primaryKey(),
            'email'=>$this->string(),
            'phone'=>$this->string(),
            'userName'=>$this->string(),
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
