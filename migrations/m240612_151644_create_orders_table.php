<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders}}`.
 */
class m240612_151644_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%orders}}', [
            'order_id' => $this->primaryKey(),
            'area_id' => $this->integer(),
            'address_id'=> $this->integer(),
            'phoneNumber' =>$this->string(),
            'streetVal' =>$this->string(),
            'dom' => $this->string(),
            'kvartira'=> $this->string(),
            'poverh'=> $this->string(),
            'podezd'=> $this->string(),
            'type_delivery'=> $this->integer(),
            'admin_accsess'=> $this->integer(),
            'kitchen_accsess'=> $this->integer(),
            'courier_accsess'=> $this->integer(),
            'nameUser' => $this->string(),
            'paymentMethod' => $this->string(),
            'price' => $this->decimal(7,2)->notNull(),
            'totalCost' => $this->string(),
            'count' => $this->integer(),
            'product_id'=>$this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%orders}}');
    }
}
