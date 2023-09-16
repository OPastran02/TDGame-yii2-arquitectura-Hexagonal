<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%abilities}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%objects}}`
 */
class m230914_013020_create_abilities_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%abilities}}', [
            'id' => $this->primaryKey()->notNull()->unique(),
            'idObject' => $this->integer()->notNull(),
            'blockAttack' => $this->string(),
            'melee' => $this->integer(1),
            'fly' => $this->integer(1),
            'ranged' => $this->integer(1),
            'stealth' => $this->integer(1),
            'available' => $this->integer(1)->notNull()->defaultValue(1),
        ],$table);

        // creates index for column `idObject`
        $this->createIndex(
            '{{%idx-abilities-idObject}}',
            '{{%abilities}}',
            'idObject'
        );

        // add foreign key for table `{{%objects}}`
        $this->addForeignKey(
            '{{%fk-abilities-idObject}}',
            '{{%abilities}}',
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
            '{{%fk-abilities-idObject}}',
            '{{%abilities}}'
        );

        // drops index for column `idObject`
        $this->dropIndex(
            '{{%idx-abilities-idObject}}',
            '{{%abilities}}'
        );

        $this->dropTable('{{%abilities}}');
    }
}
