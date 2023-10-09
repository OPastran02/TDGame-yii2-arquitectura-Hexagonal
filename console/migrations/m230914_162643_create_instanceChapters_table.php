<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%instanceChapters}}`.
 */
class m230914_162643_create_instanceChapters_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%instanceChapters}}', [
            'id' => $this->integer()->notNull(),
            'idPlayer' => $this->string(36)->notNull(),
            'idChapter' => $this->integer()->notNull(),
            'finished' => $this->integer()->notNull()->defaultValue(0),
            'amountOfFinished' => $this->integer()->notNull()->defaultValue(0),
            'maxStars' => $this->integer()->notNull()->defaultValue(0),
            'available' => $this->integer(1)->notNull()->defaultValue(1),
        ],$table);

            // Creates index for column `idPlayer`
            $this->createIndex(
                '{{%idx-instanceChapters-idPlayer}}',
                '{{%instanceChapters}}',
                'idPlayer'
            );
    
            // Add foreign key for table `{{%players}}`
            $this->addForeignKey(
                '{{%fk-instanceChapters-idPlayer}}',
                '{{%instanceChapters}}',
                'idPlayer',
                '{{%players}}',
                'id',
                'CASCADE'
            );
    
            // Creates index for column `idMonsters`
            $this->createIndex(
                '{{%idx-instanceChapters-idChapter}}',
                '{{%instanceChapters}}',
                'idChapter'
            );
    
            // Add foreign key for table `{{%monsters}}`
            $this->addForeignKey(
                '{{%fk-instanceChapters-idChapter}}',
                '{{%instanceChapters}}',
                'idChapter',
                '{{%chapters}}',
                'id',
                'CASCADE'
            );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-instanceChapters-idPlayer', '{{%instanceChapters}}');
        $this->dropForeignKey('fk-instanceChapters-idChapter', '{{%instanceChapters}}');
        $this->dropTable('{{%instanceChapters}}');
    }
}
