<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%abilities}}".
 *
 * @property int $id
 * @property int $idObject
 * @property string|null $blockAttack
 * @property int|null $melee
 * @property int|null $fly
 * @property int|null $ranged
 * @property int|null $stealth
 * @property int $available
 *
 * @property Heroes[] $heroes
 * @property Objects $idObject0
 */
class Ability extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%abilities}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idObject'], 'required'],
            [['melee', 'fly', 'ranged', 'stealth', 'available'], 'integer'],
            [['idObject'], 'string', 'max' => 36],
            [['blockAttack'], 'string', 'max' => 255],
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
            'blockAttack' => 'Block Attack',
            'melee' => 'Melee',
            'fly' => 'Fly',
            'ranged' => 'Ranged',
            'stealth' => 'Stealth',
            'available' => 'Available',
        ];
    }

    public function getHeroes()
    {
        return $this->hasMany(Heroes::class, ['type' => 'id']);
    }

    public function getObject()
    {
        return $this->hasOne(Objects::class, ['id' => 'idObject']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\AbilityQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\AbilityQuery(get_called_class());
    }
}
