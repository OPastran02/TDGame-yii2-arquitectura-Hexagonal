<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%monsters}}".
 *
 * @property int $id
 * @property int $idObject
 * @property string $stats
 * @property int $available
 *
 * @property Objects $idObject0
 * @property Instancemonsters[] $instancemonsters
 * @property Stats $stats0
 */
class Monster extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%monsters}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idObject', 'stats'], 'required'],
            [['available'], 'integer'],
            [['idObject'], 'string', 'max' => 36],
            [['stats'], 'string', 'max' => 36],
            [['stats'], 'unique'],
            [['idObject'], 'exist', 'skipOnError' => true, 'targetClass' => Objects::class, 'targetAttribute' => ['idObject' => 'id']],
            [['stats'], 'exist', 'skipOnError' => true, 'targetClass' => Stats::class, 'targetAttribute' => ['stats' => 'id']],
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
            'stats' => 'Stats',
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
     * Gets query for [[Instancemonsters]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\InstancemonstersQuery
     */
    public function getInstancemonsters()
    {
        return $this->hasMany(Instancemonsters::class, ['idMonsters' => 'id']);
    }

    /**
     * Gets query for [[Stats0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\StatsQuery
     */
    public function getStats0()
    {
        return $this->hasOne(Stats::class, ['id' => 'stats']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\MonsterQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\MonsterQuery(get_called_class());
    }
}
