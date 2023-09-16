<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%instanceMonsters}}`.
 */
class m230914_161843_create_instanceMonsters_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%instanceMonsters}}', [
            'id' => $this->primaryKey(),
            'idGuild' => $this->string(36),
            'idMonsters' => $this->integer()->notNull(),
            'damageDealt' => $this->integer()->notNull()->defaultValue(0),
            'active' => $this->integer()->notNull()->defaultValue(0),
            'week' => $this->integer()->notNull()->defaultValue(0),
            'isKilled' => $this->integer()->notNull()->defaultValue(0),
            'amountOfKills' => $this->integer()->notNull()->defaultValue(0),
            'available' => $this->integer(1)->notNull()->defaultValue(1),
            'createdAt' => $this->integer(11),
            'updatedAt' => $this->integer(11),
            'createdBy' => $this->string(36),
            'updatedBy' => $this->string(36),
        ],$table);
        
        // Creates index for column `idGuild`
        $this->createIndex(
            '{{%idx-instanceMonsters-idGuild}}',
            '{{%instanceMonsters}}',
            'idGuild'
        );

        // Add foreign key for table `{{%guilds}}`
        $this->addForeignKey(
            '{{%fk-instanceMonsters-idGuild}}',
            '{{%instanceMonsters}}',
            'idGuild',
            '{{%guilds}}',
            'id',
            'CASCADE'
        );

        // Creates index for column `idMonsters`
        $this->createIndex(
            '{{%idx-instanceMonsters-idMonsters}}',
            '{{%instanceMonsters}}',
            'idMonsters'
        );

        // Add foreign key for table `{{%monsters}}`
        $this->addForeignKey(
            '{{%fk-instanceMonsters-idMonsters}}',
            '{{%instanceMonsters}}',
            'idMonsters',
            '{{%monsters}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drops foreign key for table `{{%guilds}}`
        $this->dropForeignKey(
            '{{%fk-instanceMonsters-idGuild}}',
            '{{%instanceMonsters}}'
        );

        // Drops index for column `idGuild`
        $this->dropIndex(
            '{{%idx-instanceMonsters-idGuild}}',
            '{{%instanceMonsters}}'
        );

        // Drops foreign key for table `{{%monsters}}`
        $this->dropForeignKey(
            '{{%fk-instanceMonsters-idMonsters}}',
            '{{%instanceMonsters}}'
        );

        // Drops index for column `idMonsters`
        $this->dropIndex(
            '{{%idx-instanceMonsters-idMonsters}}',
            '{{%instanceMonsters}}'
        );

        $this->dropTable('{{%instanceMonsters}}');
    }
}
