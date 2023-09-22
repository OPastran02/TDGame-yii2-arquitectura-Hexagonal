<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%heroes}}".
 *
 * @property string $id
 * @property string $idPlayer
 * @property int $idObject
 * @property int $rarity
 * @property int $nature
 * @property int $type
 * @property int $race
 * @property int $abilities
 * @property string $stats
 * @property int $experience
 * @property int $level
 * @property int $isLanded
 * @property string|null $land
 * @property int $available
 *
 * @property Abilities $abilities0
 * @property Objects $idObject0
 * @property Players $idPlayer0
 * @property Natures $nature0
 * @property Races $race0
 * @property Rarities $rarity0
 * @property Stats $stats0
 * @property Types $type0
 */
class Hero extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%heroes}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idPlayer', 'idObject', 'rarity', 'nature', 'type', 'race', 'abilities', 'stats'], 'required'],
            [['idObject', 'rarity', 'nature', 'type', 'race', 'abilities', 'experience', 'level', 'isLanded', 'available'], 'integer'],
            [['id', 'idPlayer', 'stats', 'land'], 'string', 'max' => 36],
            [['id'], 'unique'],
            [['stats'], 'unique'],
            [['abilities'], 'exist', 'skipOnError' => true, 'targetClass' => Abilities::class, 'targetAttribute' => ['abilities' => 'id']],
            [['idObject'], 'exist', 'skipOnError' => true, 'targetClass' => Objects::class, 'targetAttribute' => ['idObject' => 'id']],
            [['idPlayer'], 'exist', 'skipOnError' => true, 'targetClass' => Players::class, 'targetAttribute' => ['idPlayer' => 'id']],
            [['nature'], 'exist', 'skipOnError' => true, 'targetClass' => Natures::class, 'targetAttribute' => ['nature' => 'id']],
            [['race'], 'exist', 'skipOnError' => true, 'targetClass' => Races::class, 'targetAttribute' => ['race' => 'id']],
            [['rarity'], 'exist', 'skipOnError' => true, 'targetClass' => Rarities::class, 'targetAttribute' => ['rarity' => 'id']],
            [['stats'], 'exist', 'skipOnError' => true, 'targetClass' => Stats::class, 'targetAttribute' => ['stats' => 'id']],
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
            'idPlayer' => 'Id Player',
            'idObject' => 'Id Object',
            'rarity' => 'Rarity',
            'nature' => 'Nature',
            'type' => 'Type',
            'race' => 'Race',
            'abilities' => 'Abilities',
            'stats' => 'Stats',
            'experience' => 'Experience',
            'level' => 'Level',
            'isLanded' => 'Is Landed',
            'land' => 'Land',
            'available' => 'Available',
        ];
    }

    /**
     * Gets query for [[Abilities0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\AbilitiesQuery
     */
    public function getAbilities0()
    {
        return $this->hasOne(Abilities::class, ['id' => 'abilities']);
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
     * Gets query for [[IdPlayer0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\PlayersQuery
     */
    public function getIdPlayer0()
    {
        return $this->hasOne(Players::class, ['id' => 'idPlayer']);
    }

    /**
     * Gets query for [[Nature0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\NaturesQuery
     */
    public function getNature0()
    {
        return $this->hasOne(Natures::class, ['id' => 'nature']);
    }

    /**
     * Gets query for [[Race0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\RacesQuery
     */
    public function getRace0()
    {
        return $this->hasOne(Races::class, ['id' => 'race']);
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
     * Gets query for [[Stats0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\StatsQuery
     */
    public function getStats0()
    {
        return $this->hasOne(Stats::class, ['id' => 'stats']);
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
     * @return \common\models\query\HeroQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\HeroQuery(get_called_class());
    }
}
