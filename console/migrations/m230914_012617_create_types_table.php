<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%types}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%objects}}`
 * - `{{%boosts}}`
 */
class m230914_012617_create_types_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%types}}', [
            'id' => $this->primaryKey()->notNull()->unique(),
            'idObject' => $this->integer()->notNull(),
            'horoscope' => $this->string(20),
            'idBoost' => $this->integer(),
            'available' => $this->integer(1)->notNull()->defaultValue(1),
            'createdAt' => $this->integer(11),
            'updatedAt' => $this->integer(11),
            'createdBy' => $this->string(36),
            'updatedBy' => $this->string(36),
        ],$table);

        // creates index for column `idObject`
        $this->createIndex(
            '{{%idx-types-idObject}}',
            '{{%types}}',
            'idObject'
        );

        // add foreign key for table `{{%objects}}`
        $this->addForeignKey(
            '{{%fk-types-idObject}}',
            '{{%types}}',
            'idObject',
            '{{%objects}}',
            'id',
            'CASCADE'
        );

        // creates index for column `idBoost`
        $this->createIndex(
            '{{%idx-types-idBoost}}',
            '{{%types}}',
            'idBoost'
        );

        // add foreign key for table `{{%boosts}}`
        $this->addForeignKey(
            '{{%fk-types-idBoost}}',
            '{{%types}}',
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
            '{{%fk-types-idObject}}',
            '{{%types}}'
        );

        // drops index for column `idObject`
        $this->dropIndex(
            '{{%idx-types-idObject}}',
            '{{%types}}'
        );

        // drops foreign key for table `{{%boosts}}`
        $this->dropForeignKey(
            '{{%fk-types-idBoost}}',
            '{{%types}}'
        );

        // drops index for column `idBoost`
        $this->dropIndex(
            '{{%idx-types-idBoost}}',
            '{{%types}}'
        );

        $this->dropTable('{{%types}}');
    }
}
