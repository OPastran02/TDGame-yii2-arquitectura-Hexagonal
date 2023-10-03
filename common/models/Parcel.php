<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%parcels}}".
 *
 * @property int $id
 * @property int $idObject
 * @property int $generation
 * @property int $type
 * @property int $rarity
 * @property int $bronze
 * @property int $silver
 * @property int $gold
 * @property int $crystal
 * @property int $maxQuantity
 * @property int $shop
 * @property int $requirements
 * @property int $available
 *
 * @property Objects $idObject0
 * @property Rarities $rarity0
 * @property Requirements $requirements0
 * @property Shops $shop0
 * @property Types $type0
 */
class Parcel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%parcels}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idObject', 'type', 'rarity', 'shop', 'requirements'], 'required'],
            [['generation', 'type', 'rarity', 'bronze', 'silver', 'gold', 'crystal', 'maxQuantity', 'shop', 'requirements', 'available'], 'integer'],
            [['idObject'], 'string', 'max' => 36],
            [['idObject'], 'exist', 'skipOnError' => true, 'targetClass' => Objects::class, 'targetAttribute' => ['idObject' => 'id']],
            [['rarity'], 'exist', 'skipOnError' => true, 'targetClass' => Rarities::class, 'targetAttribute' => ['rarity' => 'id']],
            [['requirements'], 'exist', 'skipOnError' => true, 'targetClass' => Requirements::class, 'targetAttribute' => ['requirements' => 'id']],
            [['shop'], 'exist', 'skipOnError' => true, 'targetClass' => Shops::class, 'targetAttribute' => ['shop' => 'id']],
            [['type'], 'exist', 'skipOnError' => true, 'targetClass' => Types::class, 'targetAttribute' => ['type' => 'id']],
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
            'generation' => 'Generation',
            'type' => 'Type',
            'rarity' => 'Rarity',
            'bronze' => 'Bronze',
            'silver' => 'Silver',
            'gold' => 'Gold',
            'crystal' => 'Crystal',
            'maxQuantity' => 'Max Quantity',
            'shop' => 'Shop',
            'requirements' => 'Requirements',
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
     * Gets query for [[Rarity0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\RaritiesQuery
     */
    public function getRarity0()
    {
        return $this->hasOne(Rarities::class, ['id' => 'rarity']);
    }

    /**
     * Gets query for [[Requirements0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\RequirementsQuery
     */
    public function getRequirements0()
    {
        return $this->hasOne(Requirements::class, ['id' => 'requirements']);
    }

    /**
     * Gets query for [[Shop0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ShopsQuery
     */
    public function getShop0()
    {
        return $this->hasOne(Shops::class, ['id' => 'shop']);
    }

    /**
     * Gets query for [[Type0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\TypesQuery
     */
    public function getType0()
    {
        return $this->hasOne(Types::class, ['id' => 'type']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ParcelQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ParcelQuery(get_called_class());
    }
}
