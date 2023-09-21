<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%requirements}}".
 *
 * @property int $id
 * @property int $guildLevel
 * @property int $guildExperience
 * @property int $guildRank
 * @property int $guildWins
 * @property int $guildMonsterKilled
 * @property int $guildBossKilled
 * @property int $playerOnGuildRank
 * @property int $playerOnGuildfights
 * @property int $playerOnGuildWins
 * @property int $playerRank
 * @property int $playerLevel
 * @property int $playerExperience
 * @property int $chapterFinished
 * @property int $battlePass
 * @property int $ultraPass
 * @property int $available
 *
 * @property Boxes[] $boxes
 * @property Parcels[] $parcels
 */
class Requirement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%requirements}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['guildLevel', 'guildExperience', 'guildRank', 'guildWins', 'guildMonsterKilled', 'guildBossKilled', 'playerOnGuildRank', 'playerOnGuildfights', 'playerOnGuildWins', 'playerRank', 'playerLevel', 'playerExperience', 'chapterFinished', 'battlePass', 'ultraPass', 'available'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'guildLevel' => 'Guild Level',
            'guildExperience' => 'Guild Experience',
            'guildRank' => 'Guild Rank',
            'guildWins' => 'Guild Wins',
            'guildMonsterKilled' => 'Guild Monster Killed',
            'guildBossKilled' => 'Guild Boss Killed',
            'playerOnGuildRank' => 'Player On Guild Rank',
            'playerOnGuildfights' => 'Player On Guildfights',
            'playerOnGuildWins' => 'Player On Guild Wins',
            'playerRank' => 'Player Rank',
            'playerLevel' => 'Player Level',
            'playerExperience' => 'Player Experience',
            'chapterFinished' => 'Chapter Finished',
            'battlePass' => 'Battle Pass',
            'ultraPass' => 'Ultra Pass',
            'available' => 'Available',
        ];
    }

    /**
     * Gets query for [[Boxes]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\BoxesQuery
     */
    public function getBoxes()
    {
        return $this->hasMany(Boxes::class, ['idRequirements' => 'id']);
    }

    /**
     * Gets query for [[Parcels]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ParcelsQuery
     */
    public function getParcels()
    {
        return $this->hasMany(Parcels::class, ['requirements' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\RequirementQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\RequirementQuery(get_called_class());
    }
}
