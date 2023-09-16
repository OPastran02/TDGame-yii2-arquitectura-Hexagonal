<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%lands}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%objects}}`
 */
class m230914_015949_create_lands_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%lands}}', [
            'id' => $this->string(36)->notNull()->unique(),
            'height' => $this->integer()->notNull()->defaultValue(50),
            'weight' => $this->integer()->notNull()->defaultValue(50),
            'code' => $this->integer(),
            'order' => $this->text(),
            'idObject' => $this->integer()->notNull()->comment('Relación con objects'),
            'available' => $this->integer(1)->notNull()->defaultValue(1),
        ],$table);

        $this->addPrimaryKey('pk_lands', 'lands', 'id');

        // Creates index for column `idObject`
        $this->createIndex(
            '{{%idx-lands-idObject}}',
            '{{%lands}}',
            'idObject'
        );

        // Add foreign key for table `{{%objects}}`
        $this->addForeignKey(
            '{{%fk-lands-idObject}}',
            '{{%lands}}',
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
        // Drops foreign key for table `{{%objects}}`
        $this->dropForeignKey(
            '{{%fk-lands-idObject}}',
            '{{%lands}}'
        );

        // Drops index for column `idObject`
        $this->dropIndex(
            '{{%idx-lands-idObject}}',
            '{{%lands}}'
        );

        $this->dropTable('{{%lands}}');
    }
}