<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%guildlands}}`.
 */
class m230914_022942_create_guildlands_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%guildlands}}', [
            'id' => $this->primaryKey()->notNull()->unique(),
            'idMembership' => $this->integer(),
            'idWorld' => $this->integer(),
            'idland' => $this->string(36)->notNull(),
            'available' => $this->integer(1)->notNull()->defaultValue(1),
            'createdAt' => $this->integer(11),
            'updatedAt' => $this->integer(11),
            'createdBy' => $this->string(36),
            'updatedBy' => $this->string(36),
        ],$table);

        // Creates index for column `idMembership`
        $this->createIndex('idx-guildlands-idMembership', 
        '{{%guildlands}}', 
        'idMembership');

        // Add foreign key for table `{{%memberships}}`
        $this->addForeignKey('fk-guildlands-idMembership', 
        '{{%guildlands}}', 
        'idMembership', 
        '{{%memberships}}', 
        'id');

        // Creates index for column `idWorld`
        $this->createIndex('idx-guildlands-idWorld', 
        '{{%guildlands}}', 
        'idWorld');

        // Add foreign key for table `{{%worlds}}`
        $this->addForeignKey('fk-guildlands-idWorld', 
        '{{%guildlands}}', 
        'idWorld', 
        '{{%worlds}}', 
        'id', 
        'CASCADE');

        // Creates index for column `idland`
        $this->createIndex('idx-guildlands-idland', '{{%guildlands}}', 'idland');

        // Add foreign key for table `{{%lands}}`
        $this->addForeignKey('fk-guildlands-idland', '{{%guildlands}}', 'idland', '{{%lands}}', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drops foreign key for table `{{%memberships}}`
        $this->dropForeignKey('fk-guildlands-idMembership', '{{%guildlands}}');

        // Drops index for column `idMembership`
        $this->dropIndex('idx-guildlands-idMembership', '{{%guildlands}}');

        // Drops foreign key for table `{{%worlds}}`
        $this->dropForeignKey('fk-guildlands-idWorld', '{{%guildlands}}');

        // Drops index for column `idWorld`
        $this->dropIndex('idx-guildlands-idWorld', '{{%guildlands}}');

        // Drops foreign key for table `{{%lands}}`
        $this->dropForeignKey('fk-guildlands-idland', '{{%guildlands}}');

        // Drops index for column `idland`
        $this->dropIndex('idx-guildlands-idland', '{{%guildlands}}');

        $this->dropTable('{{%guildlands}}');
    }
}
