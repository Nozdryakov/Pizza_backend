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
            'area_id' => $this->integer(),
            'phoneNumber' =>$this->string(),
            'nameUser' =>$this->string(),
            'streetVal' =>$this->string(),
            'dom' => $this->string(),
            'kvartira'=> $this->string(),
            'podezd'=> $this->string(),
            'poverh'=> $this->string(),
            'paymentMethod' => $this->string(),
            'type_delivery'=> $this->string(),
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
