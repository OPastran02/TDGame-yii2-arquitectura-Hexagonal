<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%races}}".
 *
 * @property int $id
 * @property int $idObject
 * @property int|null $idBoost
 * @property int $available
 *
 * @property Boxes[] $boxes
 * @property Heroes[] $heroes
 * @property Boosts $idBoost0
 * @property Objects $idObject0
 */
class Race extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%races}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idObject'], 'required'],
            [['idObject', 'idBoost', 'available'], 'integer'],
            [['idBoost'], 'exist', 'skipOnError' => true, 'targetClass' => Boosts::class, 'targetAttribute' => ['idBoost' => 'id']],
            [['idObject'], 'exist', 'skipOnError' => true, 'targetClass' => Objects::class, 'targetAttribute' => ['idObject' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idObject' => 'Id Object',
            'idBoost' => 'Id Boost',
            'available' => 'Available',
        ];
    }

    /**
     * Gets query for [[Boxes]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\BoxesQuery
     */
    public function getBoxes()
    {
        return $this->hasMany(Boxes::class, ['idRace' => 'id']);
    }

    /**
     * Gets query for [[Heroes]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\HeroesQuery
     */
    public function getHeroes()
    {
        return $this->hasMany(Heroes::class, ['race' => 'id']);
    }

    /**
     * Gets query for [[IdBoost0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\BoostsQuery
     */
    public function getIdBoost0()
    {
        return $this->hasOne(Boosts::class, ['id' => 'idBoost']);
    }

    /**
     * Gets query for [[IdObject0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ObjectsQuery
     */
    public function getIdObject0()
    {
        return $this->hasOne(Objects::class, ['id' => 'idObject']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\RaceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\RaceQuery(get_called_class());
    }
}