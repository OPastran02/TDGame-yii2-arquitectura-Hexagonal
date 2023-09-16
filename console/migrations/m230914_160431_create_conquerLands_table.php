<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%conquerLands}}`.
 */
class m230914_160431_create_conquerLands_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%conquerLands}}', [
            'id' => $this->primaryKey()->unique()->notNull(),
            'idWorld' => $this->integer(),
            'idland' => $this->string(36)->notNull(),
            'available' => $this->integer(1)->notNull()->defaultValue(1),
        ],$table);

        // Crear índice y clave foránea para la relación con conquerWorlds
        $this->createIndex('idx-conquerLands-idWorld', '{{%conquerLands}}', 'idWorld');
        $this->addForeignKey('fk-conquerLands-idWorld', '{{%conquerLands}}', 'idWorld', '{{%conquerWorlds}}', 'id', 'CASCADE', 'CASCADE');

        // Crear clave foránea para la relación con lands
        $this->addForeignKey('fk-conquerLands-idland', '{{%conquerLands}}', 'idland', '{{%lands}}', 'id', 'CASCADE', 'CASCADE');
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Eliminar clave foránea para la relación con lands
        $this->dropForeignKey('fk-conquerLands-idland', '{{%conquerLands}}');

        // Eliminar índice y clave foránea para la relación con conquerWorlds
        $this->dropForeignKey('fk-conquerLands-idWorld', '{{%conquerLands}}');
        $this->dropIndex('idx-conquerLands-idWorld', '{{%conquerLands}}');

        $this->dropTable('{{%conquerLands}}');
    }
}
