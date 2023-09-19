<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%ranks}}".
 *
 * @property int $id
 * @property int $idObject
 * @property int $available
 *
 * @property Objects $idObject0
 * @property RankedMetrics[] $rankedMetrics
 */
class Rank extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%ranks}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idObject'], 'required'],
            [['idObject', 'available'], 'integer'],
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
            'available' => 'Available',
        ];
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
     * Gets query for [[RankedMetrics]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\RankedMetricsQuery
     */
    public function getRankedMetrics()
    {
        return $this->hasMany(RankedMetrics::class, ['rank' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\RankQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\RankQuery(get_called_class());
    }
}