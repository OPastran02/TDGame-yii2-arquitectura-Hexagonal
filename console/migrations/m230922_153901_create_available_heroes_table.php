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
            'idBox' => $this->integer(),
            'idRarity' => $this->integer(),
            'percentage' => $this->integer(),
        ],$table);

        // Creates index for column `idBox`
        $this->createIndex(
            '{{%idx_availableHeroes_idBox}}',
            '{{%availableHeroes}}',
            'idBox'
        );

        // Add foreign key for table `{{%idBox}}`
        $this->addForeignKey(
            '{{%fk_availableHeroes_idBox}}',
            '{{%availableHeroes}}',
            'idBox',
            '{{%boxes}}',
            'id',
            'CASCADE'
        );

        // Creates index for column `idBox`
        $this->createIndex(
            '{{%idx_availableHeroes_idRarity}}',
            '{{%availableHeroes}}',
            'idRarity'
        );

        // Add foreign key for table `{{%idBox}}`
        $this->addForeignKey(
            '{{%fk_availableHeroes_idRarity}}',
            '{{%availableHeroes}}',
            'idRarity',
            '{{%rarities}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_availableHeroes_idBox', 'availableHeroes');
        $this->dropForeignKey('fk_availableHeroes_idRarity', 'availableHeroes');
        $this->dropTable('availableHeroes');
    }
}
