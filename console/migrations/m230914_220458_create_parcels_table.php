<?php

use yii\db\Migration;

/**
 * Handles the creation of table `parcels`.
 */
class m230914_220458_create_parcels_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('parcels', [
            'id' => $this->primaryKey(),
            'idObject' => $this->integer()->notNull(),
            'generation' => $this->smallInteger(2)->notNull()->defaultValue(1),
            'type' => $this->integer()->notNull(),
            'rarity' => $this->integer()->notNull(),
            'bronze' => $this->integer()->notNull()->defaultValue(0),
            'silver' => $this->integer()->notNull()->defaultValue(0),
            'gold' => $this->integer()->notNull()->defaultValue(0),
            'crystal' => $this->integer()->notNull()->defaultValue(0),
            'maxQuantity' => $this->integer()->notNull()->defaultValue(0),
            'shop' => $this->integer()->notNull(),
            'requirements' => $this->integer()->notNull(),
            'available' => $this->tinyInteger(1)->notNull()->defaultValue(1),
        ],$table);


        // Add foreign key constraints
        $this->addForeignKey('fk_parcels_idObject', 'parcels', 'idObject', 'objects', 'id');
        $this->addForeignKey('fk_parcels_type', 'parcels', 'type', 'parcelType', 'id');
        $this->addForeignKey('fk_parcels_rarity', 'parcels', 'rarity', 'parcelRarities', 'id');
        $this->addForeignKey('fk_parcels_shop', 'parcels', 'shop', 'shops', 'id');
        $this->addForeignKey('fk_parcels_requirements', 'parcels', 'requirements', 'requirements', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drop foreign key constraints first
        $this->dropForeignKey('fk_parcels_idObject', 'parcels');
        $this->dropForeignKey('fk_parcels_type', 'parcels');
        $this->dropForeignKey('fk_parcels_rarity', 'parcels');
        $this->dropForeignKey('fk_parcels_shop', 'parcels');
        $this->dropForeignKey('fk_parcels_requirements', 'parcels');


        // Then drop the table
        $this->dropTable('parcels');
    }
}