<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ranked_metrics}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%rank}}`
 */
class m230914_015545_create_ranked_metrics_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%ranked_metrics}}', [
            'id' => $this->string(36)->notNull()->unique(),
            'win' => $this->integer()->notNull()->defaultValue(0),
            'loss' => $this->integer()->notNull()->defaultValue(0),
            'handicap' => $this->integer()->notNull()->defaultValue(0),
            'timePlayed' => $this->integer()->notNull()->defaultValue(0),
            'rank' => $this->integer()->notNull(),
            'maxPosition' => $this->integer()->notNull()->defaultValue(0),
            'available' => $this->integer(1)->notNull()->defaultValue(1),
        ],$table);

        $this->addPrimaryKey('pk_ranked_metrics', 'ranked_metrics', 'id');

        // creates index for column `rank`
        $this->createIndex(
            '{{%idx-ranked_metrics-rank}}',
            '{{%ranked_metrics}}',
            'rank'
        );

        // add foreign key for table `{{%rank}}`
        $this->addForeignKey(
            '{{%fk-ranked_metrics-rank}}',
            '{{%ranked_metrics}}',
            'rank',
            '{{%ranks}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%rank}}`
        $this->dropForeignKey(
            '{{%fk-ranked_metrics-rank}}',
            '{{%ranked_metrics}}'
        );

        // drops index for column `rank`
        $this->dropIndex(
            '{{%idx-ranked_metrics-rank}}',
            '{{%ranked_metrics}}'
        );

        $this->dropTable('{{%ranked_metrics}}');
    }
}
