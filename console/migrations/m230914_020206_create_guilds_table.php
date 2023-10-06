<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%guilds}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%idObject}}`
 * - `{{%stash}}`
 * - `{{%metrics}}`
 * - `{{%rankedMetrics}}`
 */
class m230914_020206_create_guilds_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%guilds}}', [
            'id' => $this->string(36)->notNull()->unique(),
            'idObject' => $this->string(36)->notNull(),
            'idstash' => $this->string(36)->unique()->notNull(),
            'idmetrics' => $this->string(36)->unique()->notNull(),
            'maxMembers' => $this->integer()->notNull()->defaultValue(20),
            'experience' => $this->integer()->notNull()->defaultValue(0),
            'level' => $this->integer()->notNull()->defaultValue(0),
            'available' => $this->integer(1)->notNull()->defaultValue(1),
        ],$table);

        $this->addPrimaryKey('pk_guilds', 'guilds', 'id');

        // creates index for column `idObject`
        $this->createIndex(
            '{{%idx-guilds-idObject}}',
            '{{%guilds}}',
            'idObject'
        );

        // add foreign key for table `{{%objects}}`
        $this->addForeignKey(
            '{{%fk-guilds-idObject}}',
            '{{%guilds}}',
            'idObject',
            '{{%objects}}',
            'id',
            'CASCADE'
        );

        // creates index for column `stash`
        $this->createIndex(
            '{{%idx-guilds-stash}}',
            '{{%guilds}}',
            'stash'
        );

        // add foreign key for table `{{%stash}}`
        $this->addForeignKey(
            '{{%fk-guilds-stash}}',
            '{{%guilds}}',
            'stash',
            '{{%stashes}}',
            'id',
            'CASCADE'
        );

        // creates index for column `metrics`
        $this->createIndex(
            '{{%idx-guilds-metrics}}',
            '{{%guilds}}',
            'metrics'
        );

        // add foreign key for table `{{%metrics}}`
        $this->addForeignKey(
            '{{%fk-guilds-metrics}}',
            '{{%guilds}}',
            'metrics',
            '{{%metrics}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%idObject}}`
        $this->dropForeignKey(
            '{{%fk-guilds-idObject}}',
            '{{%guilds}}'
        );

        // drops index for column `idObject`
        $this->dropIndex(
            '{{%idx-guilds-idObject}}',
            '{{%guilds}}'
        );

        // drops foreign key for table `{{%stash}}`
        $this->dropForeignKey(
            '{{%fk-guilds-stash}}',
            '{{%guilds}}'
        );

        // drops index for column `stash`
        $this->dropIndex(
            '{{%idx-guilds-stash}}',
            '{{%guilds}}'
        );

        // drops foreign key for table `{{%metrics}}`
        $this->dropForeignKey(
            '{{%fk-guilds-metrics}}',
            '{{%guilds}}'
        );

        // drops index for column `metrics`
        $this->dropIndex(
            '{{%idx-guilds-metrics}}',
            '{{%guilds}}'
        );

        $this->dropTable('{{%guilds}}');
    }
}
