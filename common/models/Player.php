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
            [['id', 'idwallet', 'idavatar', 'idmetrics', 'idstatus', 'idland'], 'required'],
            [['experience', 'level', 'available'], 'integer'],
            [['id', 'idwallet', 'idavatar', 'idmetrics', 'idstatus', 'idland'], 'string', 'max' => 36],
            [['id'], 'unique'],
            [['idavatar'], 'exist', 'skipOnError' => true, 'targetClass' => Avatar::class, 'targetAttribute' => ['idavatar' => 'id']],
            [['idland'], 'exist', 'skipOnError' => true, 'targetClass' => Land::class, 'targetAttribute' => ['idland' => 'id']],
            [['idmetrics'], 'exist', 'skipOnError' => true, 'targetClass' => Metric::class, 'targetAttribute' => ['idmetrics' => 'id']],
            [['idstatus'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['idstatus' => 'id']],
            [['idwallet'], 'exist', 'skipOnError' => true, 'targetClass' => Wallet::class, 'targetAttribute' => ['idwallet' => 'id']],
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
            'idstatus' => 'Idstatus',
            'idland' => 'Idland',
            'experience' => 'Experience',
            'level' => 'Level',
            'available' => 'Available',
        ];
    }


    public function getHeroes()
    {
        return $this->hasMany(Heroes::class, ['idPlayer' => 'id']);
    }

    public function getAvatar()
    {
        return $this->hasOne(Avatar::class, ['id' => 'idavatar']);
    }

    public function getLand()
    {
        return $this->hasOne(Land::class, ['id' => 'idland']);
    }

    public function getMetric()
    {
        return $this->hasOne(Metric::class, ['id' => 'idmetrics']);
    }

    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'idstatus']);
    }

    public function getWallet()
    {
        return $this->hasOne(Wallet::class, ['id' => 'idwallet']);
    }

    public function getInstancechapters()
    {
        return $this->hasMany(Instancechapters::class, ['idPlayer' => 'id']);
    }

    public function getMemberships()
    {
        return $this->hasOne(Memberships::class, ['idPlayer' => 'id']);
    }

    public static function find()
    {
        return new \common\models\query\PlayerQuery(get_called_class());
    }
}
