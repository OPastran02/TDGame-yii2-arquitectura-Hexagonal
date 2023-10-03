<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rarities}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%objects}}`
 */
class m230914_011302_create_rarities_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%rarities}}', [
            'id' => $this->integer()->notNull()->unique(),
            'idObject' => $this->string(36)->notNull(),
            'available' => $this->integer(1)->notNull()->defaultValue(1),
        ],$table);

        // creates index for column `idObject`
        $this->createIndex(
            '{{%idx-rarities-idObject}}',
            '{{%rarities}}',
            'idObject'
        );

        // add foreign key for table `{{%objects}}`
        $this->addForeignKey(
            '{{%fk-rarities-idObject}}',
            '{{%rarities}}',
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
            '{{%fk-rarities-idObject}}',
            '{{%rarities}}'
        );

        // drops index for column `idObject`
        $this->dropIndex(
            '{{%idx-rarities-idObject}}',
            '{{%rarities}}'
        );

        $this->dropTable('{{%rarities}}');
    }
}
