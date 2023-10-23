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
        $this->createTable('prototypes', [
            'id' => $this->primaryKey(),
            'rarity' => $this->integer()->notNull(),
            'nature' => $this->integer()->notNull(),
            'type' => $this->integer()->notNull(),
            'race' => $this->integer()->notNull(),
            'objectAttack' => $this->string(36)->notNull()->defaultValue(0),
            'objectDefense' => $this->string(36)->notNull()->defaultValue(0),
            'available' => $this->tinyInteger(1)->notNull()->defaultValue(1),
        ]);
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
