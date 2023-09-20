<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%guildmetrics}}".
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
 */
class GuildMetric extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%guildmetrics}}';
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
     * {@inheritdoc}
     * @return \common\models\query\GuildmetricsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\GuildmetricsQuery(get_called_class());
    }
}
