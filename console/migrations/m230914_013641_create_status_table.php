<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%status}}`.
 */
class m230914_013641_create_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%status}}', [
            'id' => $this->string(36)->notNull()->unique(),
            'honor' => $this->integer()->notNull()->defaultValue(0),
            'lastLogin' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'battlePass' => $this->integer(1)->notNull()->defaultValue(0),
            'ultraPass' => $this->integer(1)->notNull()->defaultValue(0),
            'dailyAdsViewed' => $this->integer()->notNull()->defaultValue(0),
            'adsViewed' => $this->integer()->notNull()->defaultValue(0),
            'active' => $this->integer(1)->notNull()->defaultValue(1),
            'available' => $this->integer(1)->notNull()->defaultValue(1),
            'createdAt' => $this->integer(11),
            'updatedAt' => $this->integer(11),
            'createdBy' => $this->string(36),
            'updatedBy' => $this->string(36),
        ],$table);

        $this->addPrimaryKey('pk_status', 'status', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%status}}');
    }
}
