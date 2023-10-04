<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%avatars}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%objects}}`
 */
class m230914_014646_create_avatars_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%avatars}}', [
            'id' => $this->string(36)->notNull()->unique(),
            'nickname'=> $this->string(),
            'message'=> $this->string(),
            'idObject' => $this->string(36)->notNull(),
            'available' => $this->integer(1)->notNull()->defaultValue(1),
        ],$table);

        $this->addPrimaryKey('pk_avatars', 'avatars', 'id');

        // creates index for column `idObject`
        $this->createIndex(
            '{{%idx-avatars-idObject}}',
            '{{%avatars}}',
            'idObject'
        );

        // add foreign key for table `{{%objects}}`
        $this->addForeignKey(
            '{{%fk-avatars-idObject}}',
            '{{%avatars}}',
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
        // drops foreign key for table `{{%objects}}`
        $this->dropForeignKey(
            '{{%fk-avatars-idObject}}',
            '{{%avatars}}'
        );

        // drops index for column `idObject`
        $this->dropIndex(
            '{{%idx-avatars-idObject}}',
            '{{%avatars}}'
        );

        $this->dropTable('{{%avatars}}');
    }
}
