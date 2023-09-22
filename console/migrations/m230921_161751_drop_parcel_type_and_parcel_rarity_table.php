<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%parcel_type_and_parcel_rarity}}`.
 */
class m230921_161751_drop_parcel_type_and_parcel_rarity_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('fk_parcels_type', 'parcels');
        $this->dropForeignKey('fk_parcels_rarity', 'parcels');

        $this->dropTable('{{%parcelType}}');
        $this->dropTable('{{%parcelRarities}}');

        $this->addForeignKey('fk_parcels_type', 'parcels', 'type', 'types', 'id');
        $this->addForeignKey('fk_parcels_rarity', 'parcels', 'rarity', 'rarities', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->createTable('{{%parcel_type_and_parcel_rarity}}', [
            'id' => $this->primaryKey(),
        ]);
    }
}
