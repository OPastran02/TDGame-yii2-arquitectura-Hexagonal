<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%natures}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%objects}}`
 * - `{{%boosts}}`
 */
class m230914_012849_create_natures_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%natures}}', [
            'id' => $this->primaryKey()->notNull()->unique(),
            'idObject' => $this->integer()->notNull(),
            'idBoost' => $this->integer(),
            'available' => $this->integer(1)->notNull()->defaultValue(1),
        ],$table);

        // creates index for column `idObject`
        $this->createIndex(
            '{{%idx-natures-idObject}}',
            '{{%natures}}',
            'idObject'
        );

        // add foreign key for table `{{%objects}}`
        $this->addForeignKey(
            '{{%fk-natures-idObject}}',
            '{{%natures}}',
            'idObject',
            '{{%objects}}',
            'id',
            'CASCADE'
        );

        // creates index for column `idBoost`
        $this->createIndex(
            '{{%idx-natures-idBoost}}',
            '{{%natures}}',
            'idBoost'
        );

        // add foreign key for table `{{%boosts}}`
        $this->addForeignKey(
            '{{%fk-natures-idBoost}}',
            '{{%natures}}',
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
            '{{%fk-natures-idObject}}',
            '{{%natures}}'
        );

        // drops index for column `idObject`
        $this->dropIndex(
            '{{%idx-natures-idObject}}',
            '{{%natures}}'
        );

        // drops foreign key for table `{{%boosts}}`
        $this->dropForeignKey(
            '{{%fk-natures-idBoost}}',
            '{{%natures}}'
        );

        // drops index for column `idBoost`
        $this->dropIndex(
            '{{%idx-natures-idBoost}}',
            '{{%natures}}'
        );

        $this->dropTable('{{%natures}}');
    }
}
