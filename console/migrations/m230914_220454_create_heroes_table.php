<?php

use yii\db\Migration;

/**
 * Handles the creation of table `Heroes`.
 */
class m230914_220454_create_heroes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('Heroes', [
            'id' => $this->string(36)->notNull()->unique(),
            'idPlayer' => $this->string(36)->notNull(),
            'idObject' => $this->string(36)->notNull(),
            'rarity' => $this->integer()->notNull(),
            'nature' => $this->integer()->notNull(),
            'type' => $this->integer()->notNull(),
            'race' => $this->integer()->notNull(),
            'abilities' => $this->integer()->notNull(),
            'stats' => $this->string(36)->notNull()->unique(),
            'experience' => $this->integer()->notNull()->defaultValue(0),
            'level' => $this->integer()->notNull()->defaultValue(0),
            'isLanded' => $this->tinyInteger(1)->notNull()->defaultValue(0),
            'land' => $this->string(36),
            'available' => $this->tinyInteger(1)->notNull()->defaultValue(1),
        ],$table);

        // Add foreign key constraints
        $this->addForeignKey('fk_Heroes_idPlayer', 'Heroes', 'idPlayer', 'players', 'id');
        $this->addForeignKey('fk_Heroes_idObject', 'Heroes', 'idObject', 'objects', 'id');
        $this->addForeignKey('fk_Heroes_rarity', 'Heroes', 'rarity', 'rarities', 'id');
        $this->addForeignKey('fk_Heroes_nature', 'Heroes', 'nature', 'natures', 'id');
        $this->addForeignKey('fk_Heroes_type', 'Heroes', 'type', 'types', 'id');
        $this->addForeignKey('fk_Heroes_race', 'Heroes', 'race', 'races', 'id');
        $this->addForeignKey('fk_Heroes_abilities', 'Heroes', 'abilities', 'abilities', 'id');
        $this->addForeignKey('fk_Heroes_stats', 'Heroes', 'stats', 'stats', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drop foreign key constraints first
        $this->dropForeignKey('fk_Heroes_idPlayer', 'Heroes');
        $this->dropForeignKey('fk_Heroes_idObject', 'Heroes');
        $this->dropForeignKey('fk_Heroes_rarity', 'Heroes');
        $this->dropForeignKey('fk_Heroes_nature', 'Heroes');
        $this->dropForeignKey('fk_Heroes_type', 'Heroes');
        $this->dropForeignKey('fk_Heroes_race', 'Heroes');
        $this->dropForeignKey('fk_Heroes_abilities', 'Heroes');
        $this->dropForeignKey('fk_Heroes_stats', 'Heroes');

        // Then drop the table
        $this->dropTable('Heroes');
    }
}
