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
            [['idRace'], 'exist', 'skipOnError' => true, 'targetClass' => Race::class, 'targetAttribute' => ['idRace' => 'id']],
            [['idRequirements'], 'exist', 'skipOnError' => true, 'targetClass' => Requirement::class, 'targetAttribute' => ['idRequirements' => 'id']],
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

    public function getObject()
    {
        return $this->hasOne(Objects::class, ['id' => 'idObject']);
    }

    public function getRace()
    {
        return $this->hasOne(Race::class, ['id' => 'idRace']);
    }

    public function getRequirements()
    {
        return $this->hasOne(Requirement::class, ['id' => 'idRequirements']);
    }

    public static function find()
    {
        return new \common\models\query\BoxQuery(get_called_class());
    }
}
