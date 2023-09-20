<?php

use yii\db\Migration;

/**
 * Class m230920_222005_add_idObject_field_to_conquers_table
 */
class m230920_222005_add_idObject_field_to_conquers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Eliminar dos campos existentes
        $this->dropColumn('conquers', 'name');
        $this->dropColumn('conquers', 'description');

        // Agregar un nuevo campo
        $this->addColumn('conquers', 'idObject', 'integer');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230920_222005_add_idObject_field_to_conquers_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230920_222005_add_idObject_field_to_conquers_table cannot be reverted.\n";

        return false;
    }
    */
}
