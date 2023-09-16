<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%chapters}}`.
 */
class m230914_162642_create_chapters_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%chapters}}', [
            'id' => $this->primaryKey()->notNull()->unique(),
            'idObject' => $this->integer()->notNull(),
            'idReward' => $this->integer(),
            'available' => $this->integer(1)->notNull()->defaultValue(1),
        ],$table);

        // Creates index for column `idObject`
        $this->createIndex(
            '{{%idx-chapters-idObject}}',
            '{{%chapters}}',
            'idObject'
        );

        // Add foreign key for table `{{%players}}`
        $this->addForeignKey(
            '{{%fk-chapters-idObject}}',
            '{{%chapters}}',
            'idObject',
            '{{%objects}}',
            'id',
            'CASCADE'
        );

        // Creates index for column `idObject`
        $this->createIndex(
            '{{%idx-chapters-idReward}}',
            '{{%chapters}}',
            'idReward'
        );

        // Add foreign key for table `{{%players}}`
        $this->addForeignKey(
            '{{%fk-chapters-idReward}}',
            '{{%chapters}}',
            'idReward',
            '{{%rewards}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-chapters-idObject', '{{%chapters}}');
        $this->dropForeignKey('fk-chapters-idReward', '{{%chapters}}');
        $this->dropTable('{{%chapters}}');
    }
}
