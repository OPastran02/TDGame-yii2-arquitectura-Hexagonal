<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%guildTitles}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%idObject}}`
 */
class m230914_020205_create_guildTitles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%guildTitles}}', [
            'id' => $this->primaryKey(),
            'idObject' => $this->integer()->notNull(),
            'available' => $this->integer(1)->notNull()->defaultValue(1),
            'createdAt' => $this->integer(11),
            'updatedAt' => $this->integer(11),
            'createdBy' => $this->string(36),
            'updatedBy' => $this->string(36),
        ],$table);

        // creates index for column `idObject`
        $this->createIndex(
            '{{%idx-guildTitles-idObject}}',
            '{{%guildTitles}}',
            'idObject'
        );

        // add foreign key for table `{{%objects}}`
        $this->addForeignKey(
            '{{%fk-guildTitles-idObject}}',
            '{{%guildTitles}}',
            'idObject',
            '{{%objects}}',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        
        // drops index for column `idObject`
        $this->dropIndex(
            '{{%idx-guildTitles-idObject}}',
            '{{%guildTitles}}'
        );

        // drops foreign key for table `{{%idObject}}`
        $this->dropForeignKey(
            '{{%fk-guildTitles-idObject}}',
            '{{%guildTitles}}'
        );

        $this->dropTable('{{%guildTitles}}');
    }
}
