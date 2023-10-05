<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%players}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%idwallet}}`
 * - `{{%idavatar}}`
 * - `{{%idmetrics}}`
 * - `{{%idrankedMetrics}}`
 * - `{{%idstatus}}`
 * - `{{%idland}}`
 */
class m230914_015950_create_players_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%players}}', [
            'id'                => $this->string(36)->notNull()->unique(),
            'idwallet'          => $this->string(36)->notNull(),
            'idavatar'          => $this->string(36)->notNull(),
            'idmetrics'         => $this->string(36)->notNull(),
            'idstatus'          => $this->string(36)->notNull(),
            'idland'            => $this->string(36)->notNull(),
            'experience'        => $this->integer()->notNull()->defaultValue(0),
            'level'             => $this->integer()->notNull()->defaultValue(0),
            'available'         => $this->integer(1)->notNull()->defaultValue(1),
        ],$table);

        $this->addPrimaryKey('pk_players', 'players', 'id');

        // creates index for column `idwallet`
        $this->createIndex(
            '{{%idx-players-idwallet}}',
            '{{%players}}',
            'idwallet'
        );

        // add foreign key for table `{{%idwallet}}`
        $this->addForeignKey(
            '{{%fk-players-idwallet}}',
            '{{%players}}',
            'idwallet',
            '{{%wallets}}',
            'id',
            'CASCADE'
        );

        // creates index for column `idavatar`
        $this->createIndex(
            '{{%idx-players-idavatar}}',
            '{{%players}}',
            'idavatar'
        );

        // add foreign key for table `{{%idavatar}}`
        $this->addForeignKey(
            '{{%fk-players-idavatar}}',
            '{{%players}}',
            'idavatar',
            '{{%avatars}}',
            'id',
            'CASCADE'
        );

        // creates index for column `idmetrics`
        $this->createIndex(
            '{{%idx-players-idmetrics}}',
            '{{%players}}',
            'idmetrics'
        );

        // add foreign key for table `{{%idmetrics}}`
        $this->addForeignKey(
            '{{%fk-players-idmetrics}}',
            '{{%players}}',
            'idmetrics',
            '{{%metrics}}',
            'id',
            'CASCADE'
        );


        // creates index for column `idstatus`
        $this->createIndex(
            '{{%idx-players-idstatus}}',
            '{{%players}}',
            'idstatus'
        );

        // add foreign key for table `{{%idstatus}}`
        $this->addForeignKey(
            '{{%fk-players-idstatus}}',
            '{{%players}}',
            'idstatus',
            '{{%status}}',
            'id',
            'CASCADE'
        );

        // creates index for column `idland`
        $this->createIndex(
            '{{%idx-players-idland}}',
            '{{%players}}',
            'idland'
        );

        // add foreign key for table `{{%idland}}`
        $this->addForeignKey(
            '{{%fk-players-idland}}',
            '{{%players}}',
            'idland',
            '{{%lands}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%idwallet}}`
        $this->dropForeignKey(
            '{{%fk-players-idwallet}}',
            '{{%players}}'
        );

        // drops index for column `idwallet`
        $this->dropIndex(
            '{{%idx-players-idwallet}}',
            '{{%players}}'
        );

        // drops foreign key for table `{{%idavatar}}`
        $this->dropForeignKey(
            '{{%fk-players-idavatar}}',
            '{{%players}}'
        );

        // drops index for column `idavatar`
        $this->dropIndex(
            '{{%idx-players-idavatar}}',
            '{{%players}}'
        );

        // drops foreign key for table `{{%idmetrics}}`
        $this->dropForeignKey(
            '{{%fk-players-idmetrics}}',
            '{{%players}}'
        );

        // drops index for column `idmetrics`
        $this->dropIndex(
            '{{%idx-players-idmetrics}}',
            '{{%players}}'
        );


        // drops foreign key for table `{{%idstatus}}`
        $this->dropForeignKey(
            '{{%fk-players-idstatus}}',
            '{{%players}}'
        );

        // drops index for column `idstatus`
        $this->dropIndex(
            '{{%idx-players-idstatus}}',
            '{{%players}}'
        );

        // drops foreign key for table `{{%idland}}`
        $this->dropForeignKey(
            '{{%fk-players-idland}}',
            '{{%players}}'
        );

        // drops index for column `idland`
        $this->dropIndex(
            '{{%idx-players-idland}}',
            '{{%players}}'
        );

        $this->dropTable('{{%players}}');
    }
}
