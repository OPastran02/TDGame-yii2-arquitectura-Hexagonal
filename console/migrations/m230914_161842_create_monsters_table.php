<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%monsters}}`.
 */
class m230914_161842_create_monsters_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%monsters}}', [
            'id' => $this->primaryKey()->unique()->notNull(),
            'idObject' => $this->string(36)->notNull(),
            'stats' => $this->string(36)->unique()->notNull(),
            'available' => $this->integer(1)->notNull()->defaultValue(1),
        ],$table);

        // Creates index for column `idObject`
        $this->createIndex(
            '{{%idx-monsters-idObject}}',
            '{{%monsters}}',
            'idObject'
        );

        // Add foreign key for table `{{%objects}}`
        $this->addForeignKey(
            '{{%fk-monsters-idObject}}',
            '{{%monsters}}',
            'idObject',
            '{{%objects}}',
            'id',
            'CASCADE'
        );

        // Creates index for column `stats`
        $this->createIndex(
            '{{%idx-monsters-stats}}',
            '{{%monsters}}',
            'stats',
            true
        );

        // Add foreign key for table `{{%stats}}`
        $this->addForeignKey(
            '{{%fk-monsters-stats}}',
            '{{%monsters}}',
            'stats',
            '{{%stats}}',
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
            '{{%fk-monsters-idObject}}',
            '{{%monsters}}'
        );

        // Drops index for column `idObject`
        $this->dropIndex(
            '{{%idx-monsters-idObject}}',
            '{{%monsters}}'
        );

        // Drops foreign key for table `{{%stats}}`
        $this->dropForeignKey(
            '{{%fk-monsters-stats}}',
            '{{%monsters}}'
        );

        // Drops index for column `stats`
        $this->dropIndex(
            '{{%idx-monsters-stats}}',
            '{{%monsters}}'
        );

        $this->dropTable('{{%monsters}}');
    }
}
