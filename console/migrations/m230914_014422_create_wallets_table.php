<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%wallets}}`.
 */
class m230914_014422_create_wallets_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%wallets}}', [
            'id' => $this->string(36)->notNull()->unique(),
            'bronze' => $this->integer()->notNull()->defaultValue(0),
            'silver' => $this->integer()->notNull()->defaultValue(0),
            'gold' => $this->integer()->notNull()->defaultValue(0),
            'crystal' => $this->integer()->notNull()->defaultValue(0),
            'available' => $this->integer(1)->notNull()->defaultValue(1),
            'createdAt' => $this->integer(11),
            'updatedAt' => $this->integer(11),
            'createdBy' => $this->string(36),
            'updatedBy' => $this->string(36),
        ],$table);
        
        $this->addPrimaryKey('pk_wallets', 'wallets', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%wallets}}');
    }
}
