<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%guilds}}".
 *
 * @property string $id
 * @property string $idObject
 * @property string $stash
 * @property string $metrics
 * @property int $maxMembers
 * @property int $experience
 * @property int $level
 * @property int $available
 *
 * @property Objects $idObject0
 * @property Instanceconquer $instanceconquer
 * @property Instancemonsters[] $instancemonsters
 * @property Memberships[] $memberships
 * @property Metrics $metrics0
 * @property Stashes $stash0
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
            [['id', 'idObject', 'stash', 'metrics'], 'required'],
            [['maxMembers', 'experience', 'level', 'available'], 'integer'],
            [['id', 'idObject', 'stash', 'metrics'], 'string', 'max' => 36],
            [['id'], 'unique'],
            [['stash'], 'unique'],
            [['metrics'], 'unique'],
            [['idObject'], 'exist', 'skipOnError' => true, 'targetClass' => Objects::class, 'targetAttribute' => ['idObject' => 'id']],
            [['metrics'], 'exist', 'skipOnError' => true, 'targetClass' => Metrics::class, 'targetAttribute' => ['metrics' => 'id']],
            [['stash'], 'exist', 'skipOnError' => true, 'targetClass' => Stashes::class, 'targetAttribute' => ['stash' => 'id']],
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
            'stash' => 'Stash',
            'metrics' => 'Metrics',
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
     * Gets query for [[Metrics0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\MetricsQuery
     */
    public function getMetrics0()
    {
        return $this->hasOne(Metrics::class, ['id' => 'metrics']);
    }

    /**
     * Gets query for [[Stash0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\StashesQuery
     */
    public function getStash0()
    {
        return $this->hasOne(Stashes::class, ['id' => 'stash']);
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
