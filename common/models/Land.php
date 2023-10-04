<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%lands}}".
 *
 * @property string $id
 * @property int $height
 * @property int $weight
 * @property int|null $code
 * @property string|null $order
 * @property int $idObject Relación con objects
 * @property int $available
 *
 * @property Chapterlands[] $chapterlands
 * @property Conquerlands[] $conquerlands
 * @property Guildlands[] $guildlands
 * @property Objects $idObject0
 * @property Players[] $players
 */
class Land extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%lands}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'order', 'idObject'], 'required'],
            [['height', 'weight','available'], 'integer'],
            [['gridMap','chat'], 'string'],
            [['idObject'], 'string', 'max' => 36],
            [['id'], 'string', 'max' => 36],
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
            'height' => 'Height',
            'weight' => 'Weight',
            'code' => 'Code',
            'order' => 'Order',
            'idObject' => 'Id Object',
            'available' => 'Available',
        ];
    }

    public function getChapterlands()
    {
        return $this->hasMany(Chapterlands::class, ['idland' => 'id']);
    }

    public function getConquerlands()
    {
        return $this->hasMany(Conquerlands::class, ['idland' => 'id']);
    }

    public function getGuildlands()
    {
        return $this->hasMany(Guildlands::class, ['idland' => 'id']);
    }

    public function getObject()
    {
        return $this->hasOne(Objects::class, ['id' => 'idObject']);
    }

    public function getPlayers()
    {
        return $this->hasMany(Players::class, ['idland' => 'id']);
    }

    public static function find()
    {
        return new \common\models\query\LandQuery(get_called_class());
    }
}
