<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%wallets}}".
 *
 * @property string $id
 * @property int $bronze
 * @property int $silver
 * @property int $gold
 * @property int $crystal
 * @property int $available
 *
 * @property Players[] $players
 */
class Wallet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%wallets}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['bronze', 'silver', 'gold', 'crystal', 'available'], 'integer'],
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
            'bronze' => 'Bronze',
            'silver' => 'Silver',
            'gold' => 'Gold',
            'crystal' => 'Crystal',
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
        return $this->hasMany(Players::class, ['idwallet' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\WalletQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\WalletQuery(get_called_class());
    }
}
