<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%conquers}}".
 *
 * @property int $id
 * @property int|null $idConquerWorlds
 * @property int $available
 * @property int|null $idObject
 *
 * @property Conquerworlds $idConquerWorlds0
 * @property Instanceconquer[] $instanceconquers
 */
class Conquer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%conquers}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idConquerWorlds', 'available', 'idObject'], 'integer'],
            [['idConquerWorlds'], 'exist', 'skipOnError' => true, 'targetClass' => Conquerworlds::class, 'targetAttribute' => ['idConquerWorlds' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idConquerWorlds' => 'Id Conquer Worlds',
            'available' => 'Available',
            'idObject' => 'Id Object',
        ];
    }

    /**
     * Gets query for [[IdConquerWorlds0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ConquerworldsQuery
     */
    public function getIdConquerWorlds0()
    {
        return $this->hasOne(Conquerworlds::class, ['id' => 'idConquerWorlds']);
    }

    /**
     * Gets query for [[Instanceconquers]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\InstanceconquerQuery
     */
    public function getInstanceconquers()
    {
        return $this->hasMany(Instanceconquer::class, ['idConquer' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ConquerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ConquerQuery(get_called_class());
    }
}
