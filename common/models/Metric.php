<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%metrics}}".
 *
 * @property string $id
 * @property int $win
 * @property int $loss
 * @property int $handicap
 * @property int $timePlayed
 * @property int $maxPoints
 * @property int $damageDealt
 * @property int $landsDestroyed
 * @property int $mobskilled
 * @property int $available
 *
 * @property Guilds $guilds
 * @property Players[] $players
 */
class Metric extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%metrics}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['win', 'loss', 'handicap', 'timePlayed', 'maxPoints', 'damageDealt', 'landsDestroyed', 'mobskilled', 'available'], 'integer'],
            [['id'], 'string', 'max' => 36],
            [['id'], 'unique'],
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
            'maxPoints' => 'Max Points',
            'damageDealt' => 'Damage Dealt',
            'landsDestroyed' => 'Lands Destroyed',
            'mobskilled' => 'Mobskilled',
            'available' => 'Available',
        ];
    }

    /**
     * Gets query for [[Guilds]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\GuildsQuery
     */
    public function getGuilds()
    {
        return $this->hasOne(Guilds::class, ['metrics' => 'id']);
    }

    /**
     * Gets query for [[Players]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\PlayersQuery
     */
    public function getPlayers()
    {
        return $this->hasMany(Players::class, ['idmetrics' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\MetricQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\MetricQuery(get_called_class());
    }
}
