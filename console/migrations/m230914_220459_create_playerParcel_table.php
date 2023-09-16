<?php

use yii\db\Migration;

/**
 * Handles the creation of table `playerParcel`.
 */
class m230914_220459_create_playerParcel_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('playerParcel', [
            'id' => $this->primaryKey(),
            'idParcel' => $this->integer()->notNull(),
            'idPlayer' => $this->string(36)->notNull()->unique()->comment('uuid'),
            'quantity' => $this->integer()->notNull()->defaultValue(0),
            'available' => $this->tinyInteger(1)->notNull()->defaultValue(1),
            'createdAt' => $this->integer(11),
            'updatedAt' => $this->integer(11),
            'createdBy' => $this->string(36),
            'updatedBy' => $this->string(36),
        ]);

        // Add unique key constraints
        $this->createIndex('idx_playerParcel_idParcel', 'playerParcel', 'idParcel', true);
        $this->createIndex('idx_playerParcel_idPlayer', 'playerParcel', 'idPlayer', true);

        // Add foreign key constraints
        $this->addForeignKey('fk_playerParcel_idParcel', 'playerParcel', 'idParcel', 'parcels', 'id');
        $this->addForeignKey('fk_playerParcel_idPlayer', 'playerParcel', 'idPlayer', 'players', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drop foreign key constraints first
        $this->dropForeignKey('fk_playerParcel_idParcel', 'playerParcel');
        $this->dropForeignKey('fk_playerParcel_idPlayer', 'playerParcel');

        // Drop unique key constraints
        $this->dropIndex('idx_playerParcel_idParcel', 'playerParcel');
        $this->dropIndex('idx_playerParcel_idPlayer', 'playerParcel');

        // Then drop the table
        $this->dropTable('playerParcel');
    }
}
