<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%worlds}}".
 *
 * @property int $id
 * @property int $idObject
 * @property string $idGuild
 * @property int|null $order
 * @property int $active
 * @property int $available
 *
 * @property Guildlands[] $guildlands
 * @property Guilds $idGuild0
 * @property Objects $idObject0
 */
class World extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%worlds}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idObject', 'idGuild'], 'required'],
            [['idObject', 'order', 'active', 'available'], 'integer'],
            [['idGuild'], 'string', 'max' => 36],
            [['idGuild'], 'unique'],
            [['idGuild'], 'exist', 'skipOnError' => true, 'targetClass' => Guilds::class, 'targetAttribute' => ['idGuild' => 'id']],
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
            'idGuild' => 'Id Guild',
            'order' => 'Order',
            'active' => 'Active',
            'available' => 'Available',
        ];
    }

    /**
     * Gets query for [[Guildlands]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\GuildlandsQuery
     */
    public function getGuildlands()
    {
        return $this->hasMany(Guildlands::class, ['idWorld' => 'id']);
    }

    /**
     * Gets query for [[IdGuild0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\GuildsQuery
     */
    public function getIdGuild0()
    {
        return $this->hasOne(Guilds::class, ['id' => 'idGuild']);
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
     * {@inheritdoc}
     * @return \common\models\query\WorldQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\WorldQuery(get_called_class());
    }
}
