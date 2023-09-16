<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%chapterLands}}`.
 */
class m230914_220114_create_chapterLands_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%chapterLands}}', [
            'id' => $this->primaryKey()->notNull()->unique(),
            'idchapter' => $this->integer()->notNull(),
            'idland' => $this->string(36)->notNull(),
            'available' => $this->integer(1)->notNull()->defaultValue(1),
        ],$table);

        // Creates index for column `idObject`
        $this->createIndex(
            '{{%idx-chapterLands-idchapter}}',
            '{{%chapterLands}}',
            'idchapter'
        );

        // Add foreign key for table `{{%players}}`
        $this->addForeignKey(
            '{{%fk-chapterLands-idchapter}}',
            '{{%chapterLands}}',
            'idchapter',
            '{{%chapters}}',
            'id',
            'CASCADE'
        );

        // Creates index for column `idObject`
        $this->createIndex(
            '{{%idx-chapterLands-idland}}',
            '{{%chapterLands}}',
            'idland'
        );

        // Add foreign key for table `{{%players}}`
        $this->addForeignKey(
            '{{%fk-chapterLands-idland}}',
            '{{%chapterLands}}',
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
        $this->dropForeignKey('fk-chapterLands-idchapter', '{{%chapterLands}}');
        $this->dropForeignKey('fk-chapterLands-idland', '{{%chapterLands}}');
        $this->dropTable('{{%chapterLands}}');
    }
}
