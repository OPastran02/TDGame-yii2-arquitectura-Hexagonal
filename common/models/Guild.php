<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%guilds}}".
 *
 * @property string $id
 * @property string $idObject
 * @property string $idstash
 * @property string $idmetrics
 * @property int $maxMembers
 * @property int $experience
 * @property int $level
 * @property int $available
 *
 * @property Objects $idObject0
 * @property Guildmetrics $idmetrics0
 * @property Stashes $idstash0
 * @property Instanceconquer $instanceconquer
 * @property Instancemonsters[] $instancemonsters
 * @property Memberships[] $memberships
 * @property Worlds $worlds
 */
class Guild extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%guilds}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idObject', 'idstash', 'idmetrics'], 'required'],
            [['maxMembers', 'experience', 'level', 'available'], 'integer'],
            [['id', 'idObject', 'idstash', 'idmetrics'], 'string', 'max' => 36],
            [['id'], 'unique'],
            [['idstash'], 'unique'],
            [['idmetrics'], 'unique'],
            [['idObject'], 'exist', 'skipOnError' => true, 'targetClass' => Objects::class, 'targetAttribute' => ['idObject' => 'id']],
            [['idmetrics'], 'exist', 'skipOnError' => true, 'targetClass' => Guildmetric::class, 'targetAttribute' => ['idmetrics' => 'id']],
            [['idstash'], 'exist', 'skipOnError' => true, 'targetClass' => Stash::class, 'targetAttribute' => ['idstash' => 'id']],
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
            'idstash' => 'Idstash',
            'idmetrics' => 'Idmetrics',
            'maxMembers' => 'Max Members',
            'experience' => 'Experience',
            'level' => 'Level',
            'available' => 'Available',
        ];
    }


    public function getObject()
    {
        return $this->hasOne(Objects::class, ['id' => 'idObject']);
    }

    public function getmetrics()
    {
        return $this->hasOne(Guildmetric::class, ['id' => 'idmetrics']);
    }

    public function getstash()
    {
        return $this->hasOne(Stash::class, ['id' => 'idstash']);
    }

    /**
     * Gets query for [[Instanceconquer]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\InstanceconquerQuery
     */
    public function getInstanceconquer()
    {
        return $this->hasOne(Instanceconquer::class, ['idGuild' => 'id']);
    }

    /**
     * Gets query for [[Instancemonsters]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\InstancemonstersQuery
     */
    public function getInstancemonsters()
    {
        return $this->hasMany(Instancemonsters::class, ['idGuild' => 'id']);
    }

    /**
     * Gets query for [[Memberships]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\MembershipsQuery
     */
    public function getMemberships()
    {
        return $this->hasMany(Memberships::class, ['idGuild' => 'id']);
    }

    /**
     * Gets query for [[Worlds]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\WorldsQuery
     */
    public function getWorlds()
    {
        return $this->hasOne(Worlds::class, ['idGuild' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\GuildQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\GuildQuery(get_called_class());
    }
}
