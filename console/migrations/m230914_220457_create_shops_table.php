<?php

use yii\db\Migration;

/**
 * Handles the creation of table `shops`.
 */
class m230914_220457_create_shops_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('shops', [
            'id' => $this->primaryKey(),
            'idObject' => $this->integer()->notNull(),
            'available' => $this->tinyInteger(1)->notNull()->defaultValue(1),
        ],$table);

        // Add foreign key constraint
        $this->addForeignKey('fk_shops_idObject', 'shops', 'idObject', 'objects', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drop foreign key constraint first
        $this->dropForeignKey('fk_shops_idObject', 'shops');

        // Then drop the table
        $this->dropTable('shops');
    }
}
