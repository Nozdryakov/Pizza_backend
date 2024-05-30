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
            'stock_id' => $this->primaryKey(),
            'image' => $this->string(120)->Null(),
            'discount' => $this->decimal(5, 2)->notNull()->defaultValue(0.00),
            'product_id' => $this->integer(),

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
