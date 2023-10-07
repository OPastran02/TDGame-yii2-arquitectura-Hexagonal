<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%rewards}}".
 *
 * @property int $id
 * @property int $idObject
 * @property int $bronze
 * @property int $silver
 * @property int $gold
 * @property int $crystal
 * @property int $quantity
 * @property int $available
 *
 * @property Chapters[] $chapters
 * @property Objects $idObject0
 */
class Reward extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%rewards}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idObject'], 'required'],
            [['bronze', 'silver', 'gold', 'crystal', 'quantity', 'available'], 'integer'],
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
            'idObject' => 'Id Object',
            'bronze' => 'Bronze',
            'silver' => 'Silver',
            'gold' => 'Gold',
            'crystal' => 'Crystal',
            'quantity' => 'Quantity',
            'available' => 'Available',
        ];
    }


    public function getChapters()
    {
        return $this->hasMany(Chapters::class, ['idReward' => 'id']);
    }

    public function getObject()
    {
        return $this->hasOne(Objects::class, ['id' => 'idObject']);
    }

    public static function find()
    {
        return new \common\models\query\RewardQuery(get_called_class());
    }
}
