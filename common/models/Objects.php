<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%objects}}".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $color
 * @property string $model code models
 * @property string $image code models
 * @property int $available
 *
 * @property Abilities[] $abilities
 * @property Avatars[] $avatars
 * @property Boxes[] $boxes
 * @property Chaptermobs[] $chaptermobs
 * @property Chapters[] $chapters
 * @property Conquermobs[] $conquermobs
 * @property Guilds[] $guilds
 * @property Guildtitles[] $guildtitles
 * @property Heroes[] $heroes
 * @property Lands[] $lands
 * @property Monsters[] $monsters
 * @property Natures[] $natures
 * @property Parcelrarities[] $parcelrarities
 * @property Parcels[] $parcels
 * @property Races[] $races
 * @property Ranks[] $ranks
 * @property Rarities[] $rarities
 * @property Rewards[] $rewards
 * @property Shops[] $shops
 * @property Types[] $types
 * @property Worlds[] $worlds
 */
class Objects extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%objects}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['model', 'image','id'], 'required'],
            [['available'], 'integer'],
            [['id'], 'string', 'max' => 36],
            [['name', 'description'], 'string'],
            [['color'], 'string', 'max' => 6],
            [['model', 'image'], 'string', 'max' => 18],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'color' => 'Color',
            'model' => 'Model',
            'image' => 'Image',
            'available' => 'Available',
        ];
    }

    /**
     * Gets query for [[Abilities]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\AbilitiesQuery
     */
    public function getAbilities()
    {
        return $this->hasMany(Abilities::class, ['idObject' => 'id']);
    }

    /**
     * Gets query for [[Avatars]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\AvatarsQuery
     */
    public function getAvatars()
    {
        return $this->hasMany(Avatars::class, ['idObject' => 'id']);
    }

    /**
     * Gets query for [[Boxes]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\BoxesQuery
     */
    public function getBoxes()
    {
        return $this->hasMany(Boxes::class, ['idObject' => 'id']);
    }

    /**
     * Gets query for [[Chaptermobs]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ChaptermobsQuery
     */
    public function getChaptermobs()
    {
        return $this->hasMany(Chaptermobs::class, ['idObject' => 'id']);
    }

    /**
     * Gets query for [[Chapters]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ChaptersQuery
     */
    public function getChapters()
    {
        return $this->hasMany(Chapters::class, ['idObject' => 'id']);
    }

    /**
     * Gets query for [[Conquermobs]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ConquermobsQuery
     */
    public function getConquermobs()
    {
        return $this->hasMany(Conquermobs::class, ['idObject' => 'id']);
    }

    /**
     * Gets query for [[Guilds]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\GuildsQuery
     */
    public function getGuilds()
    {
        return $this->hasMany(Guilds::class, ['idObject' => 'id']);
    }

    /**
     * Gets query for [[Guildtitles]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\GuildtitlesQuery
     */
    public function getGuildtitles()
    {
        return $this->hasMany(Guildtitles::class, ['idObject' => 'id']);
    }

    /**
     * Gets query for [[Heroes]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\HeroesQuery
     */
    public function getHeroes()
    {
        return $this->hasMany(Heroes::class, ['idObject' => 'id']);
    }

    /**
     * Gets query for [[Lands]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\LandsQuery
     */
    public function getLands()
    {
        return $this->hasMany(Lands::class, ['idObject' => 'id']);
    }

    /**
     * Gets query for [[Monsters]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\MonstersQuery
     */
    public function getMonsters()
    {
        return $this->hasMany(Monsters::class, ['idObject' => 'id']);
    }

    /**
     * Gets query for [[Natures]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\NaturesQuery
     */
    public function getNatures()
    {
        return $this->hasMany(Natures::class, ['idObject' => 'id']);
    }

    /**
     * Gets query for [[Parcelrarities]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ParcelraritiesQuery
     */
    public function getParcelrarities()
    {
        return $this->hasMany(Parcelrarities::class, ['idObject' => 'id']);
    }

    /**
     * Gets query for [[Parcels]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ParcelsQuery
     */
    public function getParcels()
    {
        return $this->hasMany(Parcels::class, ['idObject' => 'id']);
    }

    /**
     * Gets query for [[Races]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\RacesQuery
     */
    public function getRaces()
    {
        return $this->hasMany(Races::class, ['idObject' => 'id']);
    }

    /**
     * Gets query for [[Ranks]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\RanksQuery
     */
    public function getRanks()
    {
        return $this->hasMany(Ranks::class, ['idObject' => 'id']);
    }

    /**
     * Gets query for [[Rarities]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\RaritiesQuery
     */
    public function getRarities()
    {
        return $this->hasMany(Rarities::class, ['idObject' => 'id']);
    }

    /**
     * Gets query for [[Rewards]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\RewardsQuery
     */
    public function getRewards()
    {
        return $this->hasMany(Rewards::class, ['idObject' => 'id']);
    }

    /**
     * Gets query for [[Shops]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ShopsQuery
     */
    public function getShops()
    {
        return $this->hasMany(Shops::class, ['idObject' => 'id']);
    }

    /**
     * Gets query for [[Types]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\TypesQuery
     */
    public function getTypes()
    {
        return $this->hasMany(Types::class, ['idObject' => 'id']);
    }

    /**
     * Gets query for [[Worlds]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\WorldsQuery
     */
    public function getWorlds()
    {
        return $this->hasMany(Worlds::class, ['idObject' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ObjetoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ObjetoQuery(get_called_class());
    }
}
