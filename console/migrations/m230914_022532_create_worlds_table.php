<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%worlds}}`.
 */
class m230914_022532_create_worlds_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%worlds}}', [
            'id' => $this->primaryKey(),
            'idObject' => $this->integer()->notNull(),
            'idGuild' => $this->string(36)->notNull()->unique(),
            'order' => $this->integer(),
            'active' => $this->integer(1)->notNull()->defaultValue(1),
            'available' => $this->integer(1)->notNull()->defaultValue(1),
            'createdAt' => $this->integer(11),
            'updatedAt' => $this->integer(11),
            'createdBy' => $this->string(36),
            'updatedBy' => $this->string(36),
        ],$table);
        
        // Add foreign key for table `{{%objects}}`
        $this->addForeignKey(
            'fk-worlds-idObject', 
            '{{%worlds}}', 
            'idObject', 
            '{{%objects}}', 
            'id', 
            'CASCADE');

        // Add foreign key for table `{{%guilds}}`
        $this->addForeignKey(
            'fk-worlds-idGuild', 
            '{{%worlds}}', 
            'idGuild', 
            '{{%guilds}}', 
            'id', 
            'CASCADE');
    
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       // Drops foreign key for table `{{%objects}}`
       $this->dropForeignKey('fk-worlds-idObject', '{{%worlds}}');
        
       // Drops index for column `idObject`
       $this->dropIndex('idx-worlds-idObject', '{{%worlds}}');   
       // Drops foreign key for table `{{%guilds}}`
       $this->dropForeignKey('fk-worlds-idGuild', '{{%worlds}}');

       $this->dropTable('{{%worlds}}');
    }
}
