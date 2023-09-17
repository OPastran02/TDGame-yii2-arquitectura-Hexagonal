<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%boosts}}".
 *
 * @property int $id
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
 *
 * @property Natures[] $natures
 * @property Races[] $races
 * @property Types[] $types
 */
class Boost extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%boosts}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['attack', 'defense', 'towerAttack', 'towerDefense', 'hp', 'accuracy', 'speed', 'farming', 'steeling', 'wooding'], 'integer'],
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
        ];
    }

    /**
     * Gets query for [[Natures]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\NaturesQuery
     */
    public function getNatures()
    {
        return $this->hasMany(Natures::class, ['idBoost' => 'id']);
    }

    /**
     * Gets query for [[Races]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\RacesQuery
     */
    public function getRaces()
    {
        return $this->hasMany(Races::class, ['idBoost' => 'id']);
    }

    /**
     * Gets query for [[Types]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\TypesQuery
     */
    public function getTypes()
    {
        return $this->hasMany(Types::class, ['idBoost' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\BoostQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\BoostQuery(get_called_class());
    }
}
