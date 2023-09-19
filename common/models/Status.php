<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%status}}".
 *
 * @property string $id
 * @property int $honor
 * @property string $lastLogin
 * @property int $battlePass
 * @property int $ultraPass
 * @property int $dailyAdsViewed
 * @property int $adsViewed
 * @property int $active
 * @property int $available
 *
 * @property Players[] $players
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%status}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['honor', 'battlePass', 'ultraPass', 'dailyAdsViewed', 'adsViewed', 'active', 'available'], 'integer'],
            [['lastLogin'], 'safe'],
            [['id'], 'string', 'max' => 36],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'honor' => 'Honor',
            'lastLogin' => 'Last Login',
            'battlePass' => 'Battle Pass',
            'ultraPass' => 'Ultra Pass',
            'dailyAdsViewed' => 'Daily Ads Viewed',
            'adsViewed' => 'Ads Viewed',
            'active' => 'Active',
            'available' => 'Available',
        ];
    }

    /**
     * Gets query for [[Players]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\PlayersQuery
     */
    public function getPlayers()
    {
        return $this->hasMany(Players::class, ['idstatus' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\StatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\StatusQuery(get_called_class());
    }
}
