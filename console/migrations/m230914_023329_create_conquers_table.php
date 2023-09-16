<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%conquers}}`.
 */
class m230914_023329_create_conquers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%conquers}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(20)->notNull(),
            'description' => $this->string(255),
            'idConquerWorlds' => $this->integer(),
            'available' => $this->integer(1)->notNull()->defaultValue(1),
        ],$table);

        $this->addForeignKey(
            'fk-conquers-idBossWorld',
            '{{%conquers}}',
            'idConquerWorlds',
            '{{%conquerWorlds}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-conquers-idBossWorld', '{{%conquers}}');

        $this->dropTable('{{%conquers}}');
    }
}
