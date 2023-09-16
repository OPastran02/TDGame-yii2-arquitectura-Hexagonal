<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%stashes}}`.
 */
class m230914_020204_create_stashes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%stashes}}', [
            'id' => $this->string(36)->notNull()->unique(),
            'wood' => $this->integer()->notNull()->defaultValue(0),
            'steel' => $this->integer()->notNull()->defaultValue(0),
            'farm' => $this->integer()->notNull()->defaultValue(0),
            'available' => $this->integer(1)->notNull()->defaultValue(1),
            'createdAt' => $this->integer(11),
            'updatedAt' => $this->integer(11),
            'createdBy' => $this->string(36),
            'updatedBy' => $this->string(36),
        ],$table);
        
        $this->addPrimaryKey('pk_stashes', 'stashes', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%stashes}}');
    }
}
