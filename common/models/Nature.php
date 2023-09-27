<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%natures}}".
 *
 * @property int $id
 * @property int $idObject
 * @property int|null $idBoost
 * @property int $available
 *
 * @property Heroes[] $heroes
 * @property Boost $idBoost0
 * @property Objects $idObject0
 */
class Nature extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%natures}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idObject'], 'required'],
            [['idObject', 'idBoost', 'available'], 'integer'],
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
     * @return \common\models\query\NatureQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\NatureQuery(get_called_class());
    }
}
