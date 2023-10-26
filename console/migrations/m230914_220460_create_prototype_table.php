<?php

use yii\db\Migration;

/**
 * Handles the creation of table `playerParcel`.
 */
class m230914_220460_create_prototype_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('prototypes', [
            'id' => $this->primaryKey(),
            'rarity' => $this->integer()->notNull(),
            'nature' => $this->integer()->notNull(),
            'type' => $this->integer()->notNull(),
            'race' => $this->integer()->notNull(),
            'object' => $this->string(36)->notNull()->defaultValue(0),
            'available' => $this->tinyInteger(1)->notNull()->defaultValue(1),
        ],$table);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Then drop the table
        $this->dropTable('prototypes');
    }
}
