<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%races}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%objects}}`
 * - `{{%boosts}}`
 */
class m230914_012920_create_races_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%races}}', [
            'id' => $this->primaryKey()->notNull()->unique(),
            'idObject' => $this->integer()->notNull(),
            'idBoost' => $this->integer(),
            'available' => $this->integer(1)->notNull()->defaultValue(1),
            'createdAt' => $this->integer(11),
            'updatedAt' => $this->integer(11),
            'createdBy' => $this->string(36),
            'updatedBy' => $this->string(36),
        ],$table);

        // creates index for column `idObject`
        $this->createIndex(
            '{{%idx-races-idObject}}',
            '{{%races}}',
            'idObject'
        );

        // add foreign key for table `{{%objects}}`
        $this->addForeignKey(
            '{{%fk-races-idObject}}',
            '{{%races}}',
            'idObject',
            '{{%objects}}',
            'id',
            'CASCADE'
        );

        // creates index for column `idBoost`
        $this->createIndex(
            '{{%idx-races-idBoost}}',
            '{{%races}}',
            'idBoost'
        );

        // add foreign key for table `{{%boosts}}`
        $this->addForeignKey(
            '{{%fk-races-idBoost}}',
            '{{%races}}',
            'idBoost',
            '{{%boosts}}',
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
            '{{%fk-races-idObject}}',
            '{{%races}}'
        );

        // drops index for column `idObject`
        $this->dropIndex(
            '{{%idx-races-idObject}}',
            '{{%races}}'
        );

        // drops foreign key for table `{{%boosts}}`
        $this->dropForeignKey(
            '{{%fk-races-idBoost}}',
            '{{%races}}'
        );

        // drops index for column `idBoost`
        $this->dropIndex(
            '{{%idx-races-idBoost}}',
            '{{%races}}'
        );

        $this->dropTable('{{%races}}');
    }
}
