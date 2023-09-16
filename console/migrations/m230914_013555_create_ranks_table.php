<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ranks}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%objects}}`
 */
class m230914_013555_create_ranks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%ranks}}', [
            'id' => $this->primaryKey()->notNull()->unique(),
            'idObject' => $this->integer()->notNull(),
            'available' => $this->integer(1)->notNull()->defaultValue(1),
        ],$table);

        // creates index for column `idObject`
        $this->createIndex(
            '{{%idx-ranks-idObject}}',
            '{{%ranks}}',
            'idObject'
        );

        // add foreign key for table `{{%objects}}`
        $this->addForeignKey(
            '{{%fk-ranks-idObject}}',
            '{{%ranks}}',
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
            '{{%fk-ranks-idObject}}',
            '{{%ranks}}'
        );

        // drops index for column `idObject`
        $this->dropIndex(
            '{{%idx-ranks-idObject}}',
            '{{%ranks}}'
        );

        $this->dropTable('{{%ranks}}');
    }
}
