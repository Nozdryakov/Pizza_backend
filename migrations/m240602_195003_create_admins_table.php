<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%admins}}`.
 */
class m240602_195003_create_admins_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%admins}}', [
            'admin_id' => $this->primaryKey(),
            'username'=>$this->string(),
            'password'=>$this->string(),
            'authKey'=>$this->string(),
            'accessToken'=>$this->string(),
            'role'=>$this->tinyInteger(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%admins}}');
    }
}
