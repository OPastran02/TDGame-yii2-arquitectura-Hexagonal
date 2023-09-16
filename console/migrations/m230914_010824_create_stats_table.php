<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%stats}}`.
 */
class m230914_010824_create_stats_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%stats}}', [
            'id' => $this->string(36)->notNull()->unique(),
            'attack' => $this->integer(5)->notNull()->defaultValue(0),
            'defense' => $this->integer(5)->notNull()->defaultValue(0),
            'towerAttack' => $this->integer(5)->notNull()->defaultValue(0),
            'towerDefense' => $this->integer(5)->notNull()->defaultValue(0),
            'hp' => $this->integer(5)->notNull()->defaultValue(0),
            'accuracy' => $this->integer(5)->notNull()->defaultValue(0),
            'speed' => $this->integer(5)->notNull()->defaultValue(0),
            'farming' => $this->integer(5)->notNull()->defaultValue(0),
            'steeling' => $this->integer(5)->notNull()->defaultValue(0),
            'wooding' => $this->integer(5)->notNull()->defaultValue(0),
            'incAttack' => $this->integer(2)->notNull()->defaultValue(0),
            'incDefense' => $this->integer(2)->notNull()->defaultValue(0),
            'inchp' => $this->integer(2)->notNull()->defaultValue(0),
            'incTowerAttack' => $this->integer(2)->notNull()->defaultValue(0),
            'incTowerDefense' => $this->integer(2)->notNull()->defaultValue(0),
            'incAccuracy' => $this->integer(2)->notNull()->defaultValue(0),
            'incSpeed' => $this->integer(2)->notNull()->defaultValue(0),
            'incFarming' => $this->integer(2)->notNull()->defaultValue(0),
            'incSteeling' => $this->integer(2)->notNull()->defaultValue(0),
            'incWooding' => $this->integer(2)->notNull()->defaultValue(0),
            'available' => $this->integer(1)->notNull()->defaultValue(1),
            'createdAt' => $this->integer(11),
            'updatedAt' => $this->integer(11),
            'createdBy' => $this->string(36),
            'updatedBy' => $this->string(36),
        ], $tableOptions);

        $this->addPrimaryKey('pk_stats', 'stats', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%stats}}');
    }
}
