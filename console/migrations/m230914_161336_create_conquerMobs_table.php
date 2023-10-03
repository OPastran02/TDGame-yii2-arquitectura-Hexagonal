<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%conquerMobs}}`.
 */
class m230914_161336_create_conquerMobs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%conquerMobs}}', [
            'id' => $this->primaryKey(),
            'stats' => $this->string(36)->unique()->notNull(),
            'idConquerLand' => $this->integer(),
            'idObject' => $this->string(36)->notNull(),
            'available' => $this->integer(1)->notNull()->defaultValue(1),
        ],$table);

        // Crear clave foránea para la relación con objects
        $this->addForeignKey('fk-conquerMobs-idStats', '{{%conquerMobs}}', 'stats', '{{%stats}}', 'id', 'CASCADE', 'CASCADE');
 
        // Crear clave foránea para la relación con conquerLands
        $this->addForeignKey('fk-conquerMobs-idConquerLand', '{{%conquerMobs}}', 'idConquerLand', '{{%conquerLands}}', 'id', 'CASCADE', 'CASCADE');

        // Crear clave foránea para la relación con objects
        $this->addForeignKey('fk-conquerMobs-idObject', '{{%conquerMobs}}', 'idObject', '{{%objects}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Crear clave foránea para la relación con objects
        $this->dropForeignKey('fk-conquerMobs-idStats', '{{%conquerMobs}}');
 
        // Eliminar clave foránea para la relación con conquerLands
        $this->dropForeignKey('fk-conquerMobs-idConquerLand', '{{%conquerMobs}}');

        // Eliminar clave foránea para la relación con objects
        $this->dropForeignKey('fk-conquerMobs-idObject', '{{%conquerMobs}}');

        $this->dropTable('{{%conquerMobs}}');
    }
}
