<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%conquerWorlds}}`.
 */
class m230914_023328_create_conquerWorlds_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%conquerWorlds}}', [
            'id' => $this->primaryKey()->unique()->notNull(),
            'order' => $this->integer(),
            'available' => $this->integer(1)->notNull()->defaultValue(1),
        ],$table);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%conquerWorlds}}');
    }
}
