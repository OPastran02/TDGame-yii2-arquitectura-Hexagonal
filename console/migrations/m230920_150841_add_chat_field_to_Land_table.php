<?php

use yii\db\Migration;

/**
 * Class m230920_150841_add_chat_field_to_Land_table
 */
class m230920_150841_add_chat_field_to_Land_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('lands','chat','text');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230920_150841_add_chat_field_to_Land_table cannot be reverted.\n";
       
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230920_150841_add_chat_field_to_Land_table cannot be reverted.\n";

        return false;
    }
    */
}
