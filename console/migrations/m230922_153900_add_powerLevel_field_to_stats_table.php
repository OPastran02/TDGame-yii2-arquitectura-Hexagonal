<?php

use yii\db\Migration;

/**
 * Class m230922_153900_add_powerLevel_field_to_stats_table
 */
class m230922_153900_add_powerLevel_field_to_stats_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Agregar un nuevo campo
        $this->addColumn('stats', 'powerLevel', 'integer');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230922_153900_add_powerLevel_field_to_stats_table cannot be reverted.\n";

        return false;
    }
}
