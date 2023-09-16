<?php

use yii\db\Migration;

/**
 * Handles the creation of table `requirements`.
 */
class m230914_220452_create_requirements_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('requirements', [
            'id' => $this->primaryKey(),
            'guildLevel' => $this->integer()->notNull()->defaultValue(0),
            'guildExperience' => $this->integer()->notNull()->defaultValue(0),
            'guildRank' => $this->integer()->notNull()->defaultValue(0),
            'guildWins' => $this->integer()->notNull()->defaultValue(0),
            'guildMonsterKilled' => $this->integer()->notNull()->defaultValue(0),
            'guildBossKilled' => $this->integer()->notNull()->defaultValue(0),
            'playerOnGuildRank' => $this->integer()->notNull()->defaultValue(0),
            'playerOnGuildfights' => $this->integer()->notNull()->defaultValue(0),
            'playerOnGuildWins' => $this->integer()->notNull()->defaultValue(0),
            'playerRank' => $this->integer()->notNull()->defaultValue(0),
            'playerLevel' => $this->integer()->notNull()->defaultValue(0),
            'playerExperience' => $this->integer()->notNull()->defaultValue(0),
            'chapterFinished' => $this->integer()->notNull()->defaultValue(0),
            'battlePass' => $this->tinyInteger(1)->notNull()->defaultValue(1),
            'ultraPass' => $this->tinyInteger(1)->notNull()->defaultValue(1),
            'available' => $this->tinyInteger(1)->notNull()->defaultValue(1),
            'createdAt' => $this->integer(11),
            'updatedAt' => $this->integer(11),
            'createdBy' => $this->string(36),
            'updatedBy' => $this->string(36),
        ],$table);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drop the table
        $this->dropTable('requirements');
    }
}