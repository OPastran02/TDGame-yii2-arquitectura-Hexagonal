<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%stats}}".
 *
 * @property string $id
 * @property int $attack
 * @property int $defense
 * @property int $towerAttack
 * @property int $towerDefense
 * @property int $hp
 * @property int $accuracy
 * @property int $speed
 * @property int $farming
 * @property int $steeling
 * @property int $wooding
 * @property int $incAttack
 * @property int $incDefense
 * @property int $inchp
 * @property int $incTowerAttack
 * @property int $incTowerDefense
 * @property int $incAccuracy
 * @property int $incSpeed
 * @property int $incFarming
 * @property int $incSteeling
 * @property int $incWooding
 * @property int $available
 * @property int|null $createdAt
 * @property int|null $updatedAt
 * @property string|null $createdBy
 * @property string|null $updatedBy
 *
 * @property Chaptermobs[] $chaptermobs
 * @property Conquermobs $conquermobs
 * @property Heroes $heroes
 * @property Monsters $monsters
 */
class Stat extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            \yii\behaviors\TimestampBehavior::class,
            \yii\behaviors\BlameableBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%stats}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['attack', 'defense', 'towerAttack', 'towerDefense', 'hp', 'accuracy', 'speed', 'farming', 'steeling', 'wooding', 'incAttack', 'incDefense', 'inchp', 'incTowerAttack', 'incTowerDefense', 'incAccuracy', 'incSpeed', 'incFarming', 'incSteeling', 'incWooding', 'available', 'createdAt', 'updatedAt'], 'integer'],
            [['id', 'createdBy', 'updatedBy'], 'string', 'max' => 36],
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
            'attack' => 'Attack',
            'defense' => 'Defense',
            'towerAttack' => 'Tower Attack',
            'towerDefense' => 'Tower Defense',
            'hp' => 'Hp',
            'accuracy' => 'Accuracy',
            'speed' => 'Speed',
            'farming' => 'Farming',
            'steeling' => 'Steeling',
            'wooding' => 'Wooding',
            'incAttack' => 'Inc Attack',
            'incDefense' => 'Inc Defense',
            'inchp' => 'Inchp',
            'incTowerAttack' => 'Inc Tower Attack',
            'incTowerDefense' => 'Inc Tower Defense',
            'incAccuracy' => 'Inc Accuracy',
            'incSpeed' => 'Inc Speed',
            'incFarming' => 'Inc Farming',
            'incSteeling' => 'Inc Steeling',
            'incWooding' => 'Inc Wooding',
            'available' => 'Available',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
            'createdBy' => 'Created By',
            'updatedBy' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[Chaptermobs]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ChaptermobsQuery
     */
    public function getChaptermobs()
    {
        return $this->hasMany(Chaptermobs::class, ['stats' => 'id']);
    }

    /**
     * Gets query for [[Conquermobs]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ConquermobsQuery
     */
    public function getConquermobs()
    {
        return $this->hasOne(Conquermobs::class, ['stats' => 'id']);
    }

    /**
     * Gets query for [[Heroes]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\HeroesQuery
     */
    public function getHeroes()
    {
        return $this->hasOne(Heroes::class, ['stats' => 'id']);
    }

    /**
     * Gets query for [[Monsters]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\MonstersQuery
     */
    public function getMonsters()
    {
        return $this->hasOne(Monsters::class, ['stats' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\StatsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\StatsQuery(get_called_class());
    }
}
