<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%metrics}}`.
 */
class m230914_015426_create_metrics_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%metrics}}', [
            'id' => $this->string(36)->notNull()->unique(),
            'win' => $this->integer()->notNull()->defaultValue(0),
            'loss' => $this->integer()->notNull()->defaultValue(0),
            'handicap' => $this->integer()->notNull()->defaultValue(0),
            'timePlayed' => $this->integer()->notNull()->defaultValue(0),
            'maxPoints' => $this->integer()->notNull()->defaultValue(0),
            'damageDealt' => $this->integer()->notNull()->defaultValue(0),
            'landsDestroyed' => $this->integer()->notNull()->defaultValue(0),
            'mobskilled' => $this->integer()->notNull()->defaultValue(0),
            'available' => $this->integer(1)->notNull()->defaultValue(1),
        ],$table);
        
        $this->addPrimaryKey('pk_metrics', 'metrics', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%metrics}}');
    }
}
