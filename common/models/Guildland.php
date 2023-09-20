<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%guildlands}}".
 *
 * @property int $id
 * @property int|null $idMembership
 * @property int|null $idWorld
 * @property string $idland
 * @property int $available
 *
 * @property Memberships $idMembership0
 * @property Worlds $idWorld0
 * @property Lands $idland0
 */
class Guildland extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%guildlands}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idMembership', 'idWorld', 'available'], 'integer'],
            [['idland'], 'required'],
            [['idland'], 'string', 'max' => 36],
            [['idMembership'], 'exist', 'skipOnError' => true, 'targetClass' => Memberships::class, 'targetAttribute' => ['idMembership' => 'id']],
            [['idWorld'], 'exist', 'skipOnError' => true, 'targetClass' => Worlds::class, 'targetAttribute' => ['idWorld' => 'id']],
            [['idland'], 'exist', 'skipOnError' => true, 'targetClass' => Lands::class, 'targetAttribute' => ['idland' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idMembership' => 'Id Membership',
            'idWorld' => 'Id World',
            'idland' => 'Idland',
            'available' => 'Available',
        ];
    }

    /**
     * Gets query for [[IdMembership0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\MembershipsQuery
     */
    public function getIdMembership0()
    {
        return $this->hasOne(Memberships::class, ['id' => 'idMembership']);
    }

    /**
     * Gets query for [[IdWorld0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\WorldsQuery
     */
    public function getIdWorld0()
    {
        return $this->hasOne(Worlds::class, ['id' => 'idWorld']);
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
     * {@inheritdoc}
     * @return \common\models\query\GuildlandQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\GuildlandQuery(get_called_class());
    }
}
