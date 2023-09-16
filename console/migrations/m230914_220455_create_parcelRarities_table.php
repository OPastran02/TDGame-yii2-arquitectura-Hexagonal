<?php

use yii\db\Migration;

/**
 * Handles the creation of table `parcelRarities`.
 */

class m230914_220455_create_parcelRarities_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('parcelRarities', [
            'id' => $this->primaryKey(),
            'name' => $this->string(14)->notNull()->defaultValue('no name'),
            'idObject' => $this->integer()->notNull(),
            'available' => $this->tinyInteger(1)->notNull()->defaultValue(1),
            'createdAt' => $this->integer(11),
            'updatedAt' => $this->integer(11),
            'createdBy' => $this->string(36),
            'updatedBy' => $this->string(36),
        ],$table);

        // Add foreign key constraint
        $this->addForeignKey('fk_parcelRarities_idObject', 'parcelRarities', 'idObject', 'objects', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drop foreign key constraint first
        $this->dropForeignKey('fk_parcelRarities_idObject', 'parcelRarities');

        // Then drop the table
        $this->dropTable('parcelRarities');
    }
}