<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%areas}}`.
 */
class m240615_185124_create_areas_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%areas}}', [
            'area_id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'count' => $this->integer()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%areas}}');
    }
}
