<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%memberships}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%idPlayer}}`
 * - `{{%idGuild}}`
 * - `{{%guildTitle}}`
 */
class m230914_020207_create_memberships_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%memberships}}', [
            'id' => $this->primaryKey(),
            'idPlayer' => $this->string(36)->notNull()->unique(),
            'idGuild' => $this->string(36)->notNull(),
            'guildTitle' => $this->integer(),
            'weeklydamage' => $this->integer()->notNull()->defaultValue(0),
            'totaldamage' => $this->integer()->notNull()->defaultValue(0),
            'wood' => $this->integer()->notNull()->defaultValue(0),
            'steel' => $this->integer()->notNull()->defaultValue(0),
            'farm' => $this->integer()->notNull()->defaultValue(0),
            'available' => $this->integer(1)->notNull()->defaultValue(1),
        ],$table);

        // creates index for column `idPlayer`
        $this->createIndex(
            '{{%idx-memberships-idPlayer}}',
            '{{%memberships}}',
            'idPlayer'
        );

        // add foreign key for table `{{%idPlayer}}`
        $this->addForeignKey(
            '{{%fk-memberships-idPlayer}}',
            '{{%memberships}}',
            'idPlayer',
            '{{%players}}',
            'id',
            'CASCADE'
        );

        // creates index for column `idGuild`
        $this->createIndex(
            '{{%idx-memberships-idGuild}}',
            '{{%memberships}}',
            'idGuild'
        );

        // add foreign key for table `{{%guilds}}`
        $this->addForeignKey(
            '{{%fk-memberships-idGuild}}',
            '{{%memberships}}',
            'idGuild',
            '{{%guilds}}',
            'id',
            'CASCADE'
        );

        // creates index for column `guildTitle`
        $this->createIndex(
            '{{%idx-memberships-guildTitle}}',
            '{{%memberships}}',
            'guildTitle'
        );

        // add foreign key for table `{{%guildTitle}}`
        $this->addForeignKey(
            '{{%fk-memberships-guildTitle}}',
            '{{%memberships}}',
            'guildTitle',
            '{{%guildTitles}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        
        // drops index for column `idPlayer`
        $this->dropIndex(
            '{{%idx-memberships-idPlayer}}',
            '{{%memberships}}'
        );

        // drops foreign key for table `{{%idPlayer}}`
        $this->dropForeignKey(
            '{{%fk-memberships-idPlayer}}',
            '{{%memberships}}'
        );

        // drops foreign key for table `{{%idGuild}}`
        $this->dropForeignKey(
            '{{%fk-memberships-idGuild}}',
            '{{%memberships}}'
        );

        // drops index for column `idGuild`
        $this->dropIndex(
            '{{%idx-memberships-idGuild}}',
            '{{%memberships}}'
        );

        // drops foreign key for table `{{%guildTitle}}`
        $this->dropForeignKey(
            '{{%fk-memberships-guildTitle}}',
            '{{%memberships}}'
        );

        // drops index for column `guildTitle`
        $this->dropIndex(
            '{{%idx-memberships-guildTitle}}',
            '{{%memberships}}'
        );

        $this->dropTable('{{%memberships}}');
    }
}
