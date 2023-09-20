<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%conquerlands}}".
 *
 * @property int $id
 * @property int|null $idWorld
 * @property string $idland
 * @property int $available
 *
 * @property Conquermobs[] $conquermobs
 * @property Conquerworlds $idWorld0
 * @property Lands $idland0
 */
class ConquerLand extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%conquerlands}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idWorld', 'available'], 'integer'],
            [['idland'], 'required'],
            [['idland'], 'string', 'max' => 36],
            [['idWorld'], 'exist', 'skipOnError' => true, 'targetClass' => Conquerworlds::class, 'targetAttribute' => ['idWorld' => 'id']],
            [['idland'], 'exist', 'skipOnError' => true, 'targetClass' => Lands::class, 'targetAttribute' => ['idland' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idWorld' => 'Id World',
            'idland' => 'Idland',
            'available' => 'Available',
        ];
    }

    /**
     * Gets query for [[Conquermobs]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ConquermobsQuery
     */
    public function getConquermobs()
    {
        return $this->hasMany(Conquermobs::class, ['idConquerLand' => 'id']);
    }

    /**
     * Gets query for [[IdWorld0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ConquerworldsQuery
     */
    public function getIdWorld0()
    {
        return $this->hasOne(Conquerworlds::class, ['id' => 'idWorld']);
    }

    /**
     * Gets query for [[Idland0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\LandsQuery
     */
    public function getIdland0()
    {
        return $this->hasOne(Lands::class, ['id' => 'idland']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ConquerLandQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ConquerLandQuery(get_called_class());
    }
}
