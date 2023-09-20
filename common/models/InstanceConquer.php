<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%instanceconquer}}".
 *
 * @property string $idGuild
 * @property int $idConquer
 * @property int $damageDealt
 * @property int $active
 * @property int $week
 * @property int $isKilled
 * @property int $amountOfKills
 * @property int $available
 *
 * @property Conquers $idConquer0
 * @property Guilds $idGuild0
 */
class InstanceConquer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%instanceconquer}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idGuild', 'idConquer'], 'required'],
            [['idConquer', 'damageDealt', 'active', 'week', 'isKilled', 'amountOfKills', 'available'], 'integer'],
            [['idGuild'], 'string', 'max' => 36],
            [['idGuild'], 'unique'],
            [['idConquer'], 'exist', 'skipOnError' => true, 'targetClass' => Conquers::class, 'targetAttribute' => ['idConquer' => 'id']],
            [['idGuild'], 'exist', 'skipOnError' => true, 'targetClass' => Guilds::class, 'targetAttribute' => ['idGuild' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idGuild' => 'Id Guild',
            'idConquer' => 'Id Conquer',
            'damageDealt' => 'Damage Dealt',
            'active' => 'Active',
            'week' => 'Week',
            'isKilled' => 'Is Killed',
            'amountOfKills' => 'Amount Of Kills',
            'available' => 'Available',
        ];
    }

    /**
     * Gets query for [[IdConquer0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ConquersQuery
     */
    public function getIdConquer0()
    {
        return $this->hasOne(Conquers::class, ['id' => 'idConquer']);
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
     * {@inheritdoc}
     * @return \common\models\query\InstanceConquerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\InstanceConquerQuery(get_called_class());
    }
}
