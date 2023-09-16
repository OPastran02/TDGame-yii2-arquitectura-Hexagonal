<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%boxes}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%objects}}`
 * - `{{%requirements}}`
 * - `{{%races}}`
 */
class m230914_220453_create_boxes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%boxes}}', [
            'id' => $this->primaryKey(),
            'idObject' => $this->integer()->notNull(),
            'booster' => $this->text(),
            'bronze' => $this->integer()->notNull()->defaultValue(0),
            'silver' => $this->integer()->notNull()->defaultValue(0),
            'gold' => $this->integer()->notNull()->defaultValue(0),
            'crystal' => $this->integer()->notNull()->defaultValue(0),
            'idRequirements' => $this->integer(),
            'idRace' => $this->integer()->notNull(),
            'available' => $this->integer(1)->notNull()->defaultValue(1),
            'createdAt' => $this->integer(11),
            'updatedAt' => $this->integer(11),
            'createdBy' => $this->string(36),
            'updatedBy' => $this->string(36),
        ],$table);

        // Creates index for column `idObject`
        $this->createIndex(
            '{{%idx-boxes-idObject}}',
            '{{%boxes}}',
            'idObject'
        );

        // Add foreign key for table `{{%objects}}`
        $this->addForeignKey(
            '{{%fk-boxes-idObject}}',
            '{{%boxes}}',
            'idObject',
            '{{%objects}}',
            'id',
        );

        // Creates index for column `requirements`
        $this->createIndex(
            '{{%idx-boxes-requirements}}',
            '{{%boxes}}',
            'idRequirements'
        );

        // Add foreign key for table `{{%requirements}}`
        $this->addForeignKey(
            '{{%fk-boxes-requirements}}',
            '{{%boxes}}',
            'idRequirements',
            '{{%requirements}}',
            'id',
            'CASCADE'
        );

        // Creates index for column `race`
        $this->createIndex(
            '{{%idx-boxes-race}}',
            '{{%boxes}}',
            'idRace'
        );

        // Add foreign key for table `{{%races}}`
        $this->addForeignKey(
            '{{%fk-boxes-race}}',
            '{{%boxes}}',
            'idRace',
            '{{%races}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drops index for column `idObject`
        $this->dropIndex(
            '{{%idx-boxes-idObject}}',
            '{{%boxes}}'
        );

        // Drops foreign key for table `{{%objects}}`
        $this->dropForeignKey(
            '{{%fk-boxes-idObject}}',
            '{{%boxes}}'
        );

        // Drops index for column `requirements`
        $this->dropIndex(
            '{{%idx-boxes-requirements}}',
            '{{%boxes}}'
        );

        // Drops foreign key for table `{{%requirements}}`
        $this->dropForeignKey(
            '{{%fk-boxes-requirements}}',
            '{{%boxes}}'
        );

        // Drops index for column `race`
        $this->dropIndex(
            '{{%idx-boxes-race}}',
            '{{%boxes}}'
        );

        // Drops foreign key for table `{{%races}}`
        $this->dropForeignKey(
            '{{%fk-boxes-race}}',
            '{{%boxes}}'
        );


        $this->dropTable('{{%boxes}}');
    }
}