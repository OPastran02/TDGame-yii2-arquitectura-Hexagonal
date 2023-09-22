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
 *
 * @property Chaptermobs[] $chaptermobs
 * @property Conquermobs $conquermobs
 * @property Heroes $heroes
 * @property Monsters $monsters
 */
class Stat extends \yii\db\ActiveRecord
{
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
            [['attack', 'defense', 'towerAttack', 'towerDefense', 'hp', 'accuracy', 'speed', 'farming', 'steeling', 'wooding', 'incAttack', 'incDefense', 'inchp', 'incTowerAttack', 'incTowerDefense', 'incAccuracy', 'incSpeed', 'incFarming', 'incSteeling', 'incWooding', 'available','powerLevel'], 'integer'],
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
            'powerLevel' => 'power Level',
            'available' => 'Available',
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
     * @return \common\models\query\StatQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\StatQuery(get_called_class());
    }
}
