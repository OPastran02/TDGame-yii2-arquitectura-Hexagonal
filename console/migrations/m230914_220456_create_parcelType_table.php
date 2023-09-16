<?php

use yii\db\Migration;

/**
 * Handles the creation of table `parcelType`.
 */
class m230914_220456_create_parcelType_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('parcelType', [
            'id' => $this->primaryKey(),
            'name' => $this->string(20),
            'description' => $this->string(255),
            'available' => $this->tinyInteger(1)->notNull()->defaultValue(1),
        ],$table);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drop the table
        $this->dropTable('parcelType');
    }
}