<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%types}}".
 *
 * @property int $id
 * @property int $idObject
 * @property string|null $horoscope
 * @property int|null $idBoost
 * @property int $available
 *
 * @property Heroes[] $heroes
 * @property Boost $idBoost0
 * @property Objects $idObject0
 */
class Type extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%types}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idObject'], 'required'],
            [['idObject', 'idBoost', 'available'], 'integer'],
            [['horoscope'], 'string', 'max' => 20],
            [['idBoost'], 'exist', 'skipOnError' => true, 'targetClass' => Boost::class, 'targetAttribute' => ['idBoost' => 'id']],
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
            'horoscope' => 'Horoscope',
            'idBoost' => 'Id Boost',
            'available' => 'Available',
        ];
    }


    public function getHeroes()
    {
        return $this->hasMany(Heroes::class, ['type' => 'id']);
    }


    public function getBoost()
    {
        return $this->hasOne(Boost::class, ['id' => 'idBoost']);
    }


    public function getObject()
    {
        return $this->hasOne(Objects::class, ['id' => 'idObject']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\TypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\TypeQuery(get_called_class());
    }
}
