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
            [['id', 'idObject'], 'required'],
            [['height', 'weight', 'code', 'idObject', 'available'], 'integer'],
            [['order'], 'string'],
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

    /**
     * Gets query for [[Chapterlands]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ChapterlandsQuery
     */
    public function getChapterlands()
    {
        return $this->hasMany(Chapterlands::class, ['idland' => 'id']);
    }

    /**
     * Gets query for [[Conquerlands]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ConquerlandsQuery
     */
    public function getConquerlands()
    {
        return $this->hasMany(Conquerlands::class, ['idland' => 'id']);
    }

    /**
     * Gets query for [[Guildlands]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\GuildlandsQuery
     */
    public function getGuildlands()
    {
        return $this->hasMany(Guildlands::class, ['idland' => 'id']);
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
     * Gets query for [[Players]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\PlayersQuery
     */
    public function getPlayers()
    {
        return $this->hasMany(Players::class, ['idland' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\LandQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\LandQuery(get_called_class());
    }
}
