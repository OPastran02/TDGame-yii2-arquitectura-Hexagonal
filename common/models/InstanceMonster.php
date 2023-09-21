<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%instancemonsters}}".
 *
 * @property int $id
 * @property string|null $idGuild
 * @property int $idMonsters
 * @property int $damageDealt
 * @property int $active
 * @property int $week
 * @property int $isKilled
 * @property int $amountOfKills
 * @property int $available
 *
 * @property Guilds $idGuild0
 * @property Monsters $idMonsters0
 */
class InstanceMonster extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%instancemonsters}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idMonsters'], 'required'],
            [['idMonsters', 'damageDealt', 'active', 'week', 'isKilled', 'amountOfKills', 'available'], 'integer'],
            [['idGuild'], 'string', 'max' => 36],
            [['idGuild'], 'exist', 'skipOnError' => true, 'targetClass' => Guilds::class, 'targetAttribute' => ['idGuild' => 'id']],
            [['idMonsters'], 'exist', 'skipOnError' => true, 'targetClass' => Monsters::class, 'targetAttribute' => ['idMonsters' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idGuild' => 'Id Guild',
            'idMonsters' => 'Id Monsters',
            'damageDealt' => 'Damage Dealt',
            'active' => 'Active',
            'week' => 'Week',
            'isKilled' => 'Is Killed',
            'amountOfKills' => 'Amount Of Kills',
            'available' => 'Available',
        ];
    }

    /**
     * Gets query for [[IdGuild0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\GuildsQuery
     */
    public function getIdGuild0()
    {
        return $this->hasOne(Guilds::class, ['id' => 'idGuild']);
    }

    /**
     * Gets query for [[IdMonsters0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\MonstersQuery
     */
    public function getIdMonsters0()
    {
        return $this->hasOne(Monsters::class, ['id' => 'idMonsters']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\InstanceMonsterQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\InstanceMonsterQuery(get_called_class());
    }
}
