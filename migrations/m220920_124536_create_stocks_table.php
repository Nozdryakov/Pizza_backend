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
            'discount' => $this->decimal(5,2)->notNull(),
            'product_id' => $this->integer()->notNull()->unique(),

        ]);
        $this->addForeignKey(
            'fk-stocks-product',
            'stocks',
            'product_id',
            'product',
            'product_id',
            'CASCADE',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-stocks-product',
            'stocks'
        );
        $this->dropTable('{{%stocks}}');
    }
}
