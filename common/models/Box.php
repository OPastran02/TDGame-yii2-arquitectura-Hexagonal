<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%boxes}}".
 *
 * @property int $id
 * @property int $idObject
 * @property string|null $booster
 * @property int $bronze
 * @property int $silver
 * @property int $gold
 * @property int $crystal
 * @property int|null $idRequirements
 * @property int $idRace
 * @property int $available
 *
 * @property Objects $idObject0
 * @property Races $idRace0
 * @property Requirements $idRequirements0
 */
class Box extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%boxes}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idObject', 'idRace'], 'required'],
            [['bronze', 'silver', 'gold', 'crystal', 'idRequirements', 'idRace', 'available'], 'integer'],
            [['idObject'], 'string', 'max' => 36],
            [['booster'], 'string'],
            [['idObject'], 'exist', 'skipOnError' => true, 'targetClass' => Objects::class, 'targetAttribute' => ['idObject' => 'id']],
            [['idRace'], 'exist', 'skipOnError' => true, 'targetClass' => Races::class, 'targetAttribute' => ['idRace' => 'id']],
            [['idRequirements'], 'exist', 'skipOnError' => true, 'targetClass' => Requirements::class, 'targetAttribute' => ['idRequirements' => 'id']],
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
            'booster' => 'Booster',
            'bronze' => 'Bronze',
            'silver' => 'Silver',
            'gold' => 'Gold',
            'crystal' => 'Crystal',
            'idRequirements' => 'Id Requirements',
            'idRace' => 'Id Race',
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
     * Gets query for [[IdRace0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\RacesQuery
     */
    public function getIdRace0()
    {
        return $this->hasOne(Races::class, ['id' => 'idRace']);
    }

    /**
     * Gets query for [[IdRequirements0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\RequirementsQuery
     */
    public function getIdRequirements0()
    {
        return $this->hasOne(Requirements::class, ['id' => 'idRequirements']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\BoxQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\BoxQuery(get_called_class());
    }
}
