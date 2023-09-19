<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%ranked_metrics}}".
 *
 * @property string $id
 * @property int $win
 * @property int $loss
 * @property int $handicap
 * @property int $timePlayed
 * @property int $rank
 * @property int $maxPosition
 * @property int $available
 *
 * @property Players[] $players
 * @property Ranks $rank0
 */
class RankedMetric extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%ranked_metrics}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'rank'], 'required'],
            [['win', 'loss', 'handicap', 'timePlayed', 'rank', 'maxPosition', 'available'], 'integer'],
            [['id'], 'string', 'max' => 36],
            [['id'], 'unique'],
            [['rank'], 'exist', 'skipOnError' => true, 'targetClass' => Ranks::class, 'targetAttribute' => ['rank' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'win' => 'Win',
            'loss' => 'Loss',
            'handicap' => 'Handicap',
            'timePlayed' => 'Time Played',
            'rank' => 'Rank',
            'maxPosition' => 'Max Position',
            'available' => 'Available',
        ];
    }

    /**
     * Gets query for [[Players]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\PlayersQuery
     */
    public function getPlayers()
    {
        return $this->hasMany(Players::class, ['idrankedMetrics' => 'id']);
    }

    /**
     * Gets query for [[Rank0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\RanksQuery
     */
    public function getRank0()
    {
        return $this->hasOne(Ranks::class, ['id' => 'rank']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\RankedMetricQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\RankedMetricQuery(get_called_class());
    }
}
