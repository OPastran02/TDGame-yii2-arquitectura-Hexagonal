<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%players}}".
 *
 * @property string $id
 * @property string $idwallet
 * @property string $idavatar
 * @property string $idmetrics
 * @property string $idrankedMetrics
 * @property string $idstatus
 * @property string $idland
 * @property int $experience
 * @property int $level
 * @property int $available
 *
 * @property Heroes[] $heroes
 * @property Avatars $idavatar0
 * @property Lands $idland0
 * @property Metrics $idmetrics0
 * @property RankedMetrics $idrankedMetrics0
 * @property Status $idstatus0
 * @property Wallets $idwallet0
 * @property Instancechapters[] $instancechapters
 * @property Memberships $memberships
 */
class Player extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%players}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idwallet', 'idavatar', 'idmetrics', 'idrankedMetrics', 'idstatus', 'idland'], 'required'],
            [['experience', 'level', 'available'], 'integer'],
            [['id', 'idwallet', 'idavatar', 'idmetrics', 'idrankedMetrics', 'idstatus', 'idland'], 'string', 'max' => 36],
            [['id'], 'unique'],
            [['idavatar'], 'exist', 'skipOnError' => true, 'targetClass' => Avatars::class, 'targetAttribute' => ['idavatar' => 'id']],
            [['idland'], 'exist', 'skipOnError' => true, 'targetClass' => Lands::class, 'targetAttribute' => ['idland' => 'id']],
            [['idmetrics'], 'exist', 'skipOnError' => true, 'targetClass' => Metrics::class, 'targetAttribute' => ['idmetrics' => 'id']],
            [['idrankedMetrics'], 'exist', 'skipOnError' => true, 'targetClass' => RankedMetrics::class, 'targetAttribute' => ['idrankedMetrics' => 'id']],
            [['idstatus'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['idstatus' => 'id']],
            [['idwallet'], 'exist', 'skipOnError' => true, 'targetClass' => Wallets::class, 'targetAttribute' => ['idwallet' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idwallet' => 'Idwallet',
            'idavatar' => 'Idavatar',
            'idmetrics' => 'Idmetrics',
            'idrankedMetrics' => 'Idranked Metrics',
            'idstatus' => 'Idstatus',
            'idland' => 'Idland',
            'experience' => 'Experience',
            'level' => 'Level',
            'available' => 'Available',
        ];
    }

    /**
     * Gets query for [[Heroes]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\HeroesQuery
     */
    public function getHeroes()
    {
        return $this->hasMany(Heroes::class, ['idPlayer' => 'id']);
    }

    /**
     * Gets query for [[Idavatar0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\AvatarsQuery
     */
    public function getIdavatar0()
    {
        return $this->hasOne(Avatars::class, ['id' => 'idavatar']);
    }

    /**
     * Gets query for [[Idland0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\LandsQuery
     */
    public function getIdland0()
    {
        return $this->hasOne(Lands::class, ['id' => 'idland']);
    }

    /**
     * Gets query for [[Idmetrics0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\MetricsQuery
     */
    public function getIdmetrics0()
    {
        return $this->hasOne(Metrics::class, ['id' => 'idmetrics']);
    }

    /**
     * Gets query for [[IdrankedMetrics0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\RankedMetricsQuery
     */
    public function getIdrankedMetrics0()
    {
        return $this->hasOne(RankedMetrics::class, ['id' => 'idrankedMetrics']);
    }

    /**
     * Gets query for [[Idstatus0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\StatusQuery
     */
    public function getIdstatus0()
    {
        return $this->hasOne(Status::class, ['id' => 'idstatus']);
    }

    /**
     * Gets query for [[Idwallet0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\WalletsQuery
     */
    public function getIdwallet0()
    {
        return $this->hasOne(Wallets::class, ['id' => 'idwallet']);
    }

    /**
     * Gets query for [[Instancechapters]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\InstancechaptersQuery
     */
    public function getInstancechapters()
    {
        return $this->hasMany(Instancechapters::class, ['idPlayer' => 'id']);
    }

    /**
     * Gets query for [[Memberships]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\MembershipsQuery
     */
    public function getMemberships()
    {
        return $this->hasOne(Memberships::class, ['idPlayer' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\PlayerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\PlayerQuery(get_called_class());
    }
}
