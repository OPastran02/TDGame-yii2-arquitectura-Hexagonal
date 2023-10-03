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

    /**
     * Gets query for [[Chapters]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ChaptersQuery
     */
    public function getChapters()
    {
        return $this->hasMany(Chapters::class, ['idReward' => 'id']);
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
     * @return \common\models\query\RewardQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\RewardQuery(get_called_class());
    }
}
