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

        $this->addForeignKey(
            'fk-popular-product',
            'popular',
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
            'fk-popular-product',
            'popular'
        );
        $this->dropTable('{{%popular}}');
    }
}
