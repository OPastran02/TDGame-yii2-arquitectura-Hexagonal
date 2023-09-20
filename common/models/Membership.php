<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%memberships}}".
 *
 * @property int $id
 * @property string $idPlayer
 * @property string $idGuild
 * @property int|null $guildTitle
 * @property int $weeklydamage
 * @property int $totaldamage
 * @property int $wood
 * @property int $steel
 * @property int $farm
 * @property int $available
 *
 * @property Guildtitles $guildTitle0
 * @property Guildlands[] $guildlands
 * @property Guilds $idGuild0
 * @property Players $idPlayer0
 */
class Membership extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%memberships}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPlayer', 'idGuild'], 'required'],
            [['guildTitle', 'weeklydamage', 'totaldamage', 'wood', 'steel', 'farm', 'available'], 'integer'],
            [['idPlayer', 'idGuild'], 'string', 'max' => 36],
            [['idPlayer'], 'unique'],
            [['guildTitle'], 'exist', 'skipOnError' => true, 'targetClass' => Guildtitles::class, 'targetAttribute' => ['guildTitle' => 'id']],
            [['idGuild'], 'exist', 'skipOnError' => true, 'targetClass' => Guilds::class, 'targetAttribute' => ['idGuild' => 'id']],
            [['idPlayer'], 'exist', 'skipOnError' => true, 'targetClass' => Players::class, 'targetAttribute' => ['idPlayer' => 'id']],
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
            'idGuild' => 'Id Guild',
            'guildTitle' => 'Guild Title',
            'weeklydamage' => 'Weeklydamage',
            'totaldamage' => 'Totaldamage',
            'wood' => 'Wood',
            'steel' => 'Steel',
            'farm' => 'Farm',
            'available' => 'Available',
        ];
    }

    /**
     * Gets query for [[GuildTitle0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\GuildtitlesQuery
     */
    public function getGuildTitle0()
    {
        return $this->hasOne(Guildtitles::class, ['id' => 'guildTitle']);
    }

    /**
     * Gets query for [[Guildlands]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\GuildlandsQuery
     */
    public function getGuildlands()
    {
        return $this->hasMany(Guildlands::class, ['idMembership' => 'id']);
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
     * Gets query for [[IdPlayer0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\PlayersQuery
     */
    public function getIdPlayer0()
    {
        return $this->hasOne(Players::class, ['id' => 'idPlayer']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\MembershipQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\MembershipQuery(get_called_class());
    }
}
