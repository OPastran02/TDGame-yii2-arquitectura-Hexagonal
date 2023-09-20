<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%conquerworlds}}".
 *
 * @property int $id
 * @property int|null $order
 * @property int $available
 *
 * @property Conquerlands[] $conquerlands
 * @property Conquers[] $conquers
 */
class Conquerworld extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%conquerworlds}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order', 'available'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order' => 'Order',
            'available' => 'Available',
        ];
    }

    /**
     * Gets query for [[Conquerlands]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ConquerlandsQuery
     */
    public function getConquerlands()
    {
        return $this->hasMany(Conquerlands::class, ['idWorld' => 'id']);
    }

    /**
     * Gets query for [[Conquers]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ConquersQuery
     */
    public function getConquers()
    {
        return $this->hasMany(Conquers::class, ['idConquerWorlds' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ConquerworldQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ConquerworldQuery(get_called_class());
    }
}
