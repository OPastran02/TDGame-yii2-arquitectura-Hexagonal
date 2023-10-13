<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%instanceConquer}}`.
 */
class m230914_023330_create_instanceConquer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%instanceConquer}}', [
            'idGuild' => $this->string(36)->notNull()->unique(),
            'idConquer' => $this->integer()->notNull(),
            'damageDealt' => $this->integer()->notNull()->defaultValue(0),
            'active' => $this->integer(1)->notNull()->defaultValue(1),
            'week' => $this->integer()->notNull()->defaultValue(0),
            'isKilled' => $this->integer(1)->notNull()->defaultValue(0),
            'amountOfKills' => $this->integer()->notNull()->defaultValue(0),
            'available' => $this->integer(1)->notNull()->defaultValue(1),
        ],$table);

        // Add foreign key for table `{{%guilds}}`
        $this->addForeignKey(
            'fk-instanceConquer-guilds', 
            '{{%instanceConquer}}', 
            'idGuild', 
            '{{%guilds}}', 
            'id');

        // Add foreign key for table `{{%conquers}}`
        $this->addForeignKey(
            'fk-instanceConquer-conquers', 
            '{{%instanceConquer}}', 
            'idConquer', 
            '{{%conquers}}', 
            'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        // Drops index for column `idWorld`
        $this->dropIndex('fk-instanceConquer-conquers', '{{%instanceConquer}}');

        // Drops foreign key for table `{{%lands}}`
        $this->dropForeignKey('fk-instanceConquer-guilds', '{{%instanceConquer}}');

        $this->dropTable('{{%instanceConquer}}');
    }
}
