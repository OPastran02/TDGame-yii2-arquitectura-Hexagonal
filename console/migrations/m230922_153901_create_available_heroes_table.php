<?php

use yii\db\Migration;

/**
 * Class m230922_153900_add_powerLevel_field_to_stats_table
 */
class m230922_153901_create_available_heroes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%availableHeroes}}', [
            'id' => $this->integer(),
            'idRace' => $this->string(36)->notNull(),
            'value' => $this->integer(),
        ],$table);

        // Creates index for column `idRace`
        $this->createIndex(
            '{{%idx_availableHeroes_idRace}}',
            '{{%availableHeroes}}',
            'idRace'
        );

        // Add foreign key for table `{{%players}}`
        $this->addForeignKey(
            '{{%fk_availableHeroes_idRace}}',
            '{{%availableHeroes}}',
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
        $this->dropForeignKey('fk_availableHeroes_idRace', 'availableHeroes');
        $this->dropTable('availableHeroes');
    }
}
