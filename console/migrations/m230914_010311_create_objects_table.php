<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%objects}}`.
 */
class m230914_010311_create_objects_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%objects}}', [
            'id' => $this->string(36)->notNull()->unique(),
            'name' => $this->string()->notNull()->defaultValue('no name'),
            'description' => $this->string()->notNull()->defaultValue('no description'),
            'color' => $this->string(6)->notNull()->defaultValue('FFFFFF'),
            'model' => $this->string(18)->notNull()->comment('code models'),
            'image' => $this->string(18)->notNull()->comment('code models'),
            'available' => $this->integer(1)->notNull()->defaultValue(1),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%objects}}');
    }
}
