<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%rarities}}".
 *
 * @property int $id
 * @property int $idObject
 * @property int $available
 *
 * @property Heroes[] $heroes
 * @property Objects $idObject0
 */
class Rarity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%rarities}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idObject'], 'required'],
            [['id','available'], 'integer'],
            [['idObject'], 'string', 'max' => 36],
            [['id'], 'unique'],
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

    public function getObject()
    {
        return $this->hasOne(Objects::class, ['id' => 'idObject']);
    }

    /**
     * Gets query for [[Heroes]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\HeroesQuery
     */
    public function getHeroes()
    {
        return $this->hasMany(Heroes::class, ['rarity' => 'id']);
    }


    /**
     * {@inheritdoc}
     * @return \common\models\query\RarityQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\RarityQuery(get_called_class());
    }
}
