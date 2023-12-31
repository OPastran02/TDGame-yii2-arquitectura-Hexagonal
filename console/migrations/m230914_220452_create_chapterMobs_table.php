<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%chapterMobs}}`.
 */
class m230914_220452_create_chapterMobs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%chapterMobs}}', [
            'id' => $this->primaryKey()->notNull()->unique(),
            'idObject' => $this->string(36)->notNull(),
            'idChapterLand' => $this->integer(),
            'idStats' => $this->string(36)->notNull(),
            'available' => $this->integer(1)->notNull()->defaultValue(1),
        ],$table);

        
        // Creates index for column `idObject`
        $this->createIndex(
            '{{%idx-chapterMobs-idObject}}',
            '{{%chapterMobs}}',
            'idObject'
        );

        // Add foreign key for table `{{%players}}`
        $this->addForeignKey(
            '{{%fk-chapterMobs-idObject}}',
            '{{%chapterMobs}}',
            'idObject',
            '{{%objects}}',
            'id',
            'CASCADE'
        );

                
        // Creates index for column `idObject`
        $this->createIndex(
            '{{%idx-chapterMobs-idChapterLand}}',
            '{{%chapterMobs}}',
            'idObject'
        );

        // Add foreign key for table `{{%players}}`
        $this->addForeignKey(
            '{{%fk-chapterMobs-idChapterLand}}',
            '{{%chapterMobs}}',
            'idChapterLand',
            '{{%chapterLands}}',
            'id',
            'CASCADE'
        );

        // Creates index for column `idObject`
        $this->createIndex(
            '{{%idx-chapterMobs-stats}}',
            '{{%chapterMobs}}',
            'idStats'
        );

        // Add foreign key for table `{{%players}}`
        $this->addForeignKey(
            '{{%fk-chapterMobs-stats}}',
            '{{%chapterMobs}}',
            'idStats',
            '{{%stats}}',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-chapterLands-idObject', '{{%chapterMobs}}');
        $this->dropForeignKey('fk-chapterLands-idChapterLand', '{{%chapterMobs}}');
        $this->dropForeignKey('fk-chapterLands-stats', '{{%chapterMobs}}');
        $this->dropTable('{{%chapterMobs}}');
    }
}
