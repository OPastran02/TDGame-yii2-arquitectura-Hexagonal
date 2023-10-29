<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%prototypes}}".
 *
 * @property int $id
 * @property int $rarity
 * @property int $nature
 * @property int $type
 * @property int $race
 * @property string $idObject
 * @property int $available
 *
 * @property Objects $idObject0
 */
class Prototype extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%prototypes}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rarity', 'nature', 'type', 'race'], 'required'],
            [['rarity', 'nature', 'type', 'race', 'available'], 'integer'],
            [['idObject'], 'string', 'max' => 36],
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
            'rarity' => 'Rarity',
            'nature' => 'Nature',
            'type' => 'Type',
            'race' => 'Race',
            'idObject' => 'Id Object',
            'available' => 'Available',
        ];
    }

    public function getObject()
    {
        return $this->hasOne(Objects::class, ['id' => 'idObject']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\PrototypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\PrototypeQuery(get_called_class());
    }
}
