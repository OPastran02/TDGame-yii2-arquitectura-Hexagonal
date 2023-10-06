<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%guildtitles}}".
 *
 * @property int $id
 * @property int $idObject
 * @property int $available
 *
 * @property Objects $idObject0
 * @property Memberships[] $memberships
 */
class GuildTitle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%guildtitles}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idObject'], 'required'],
            [['available'], 'integer'],
            [['idObject'], 'string', 'max' => 36],
            [['idObject'], 'exist', 'skipOnError' => true, 'targetClass' => Objects::class, 'targetAttribute' => ['idObject' => 'id']],
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
            'available' => 'Available',
        ];
    }


    public function getObject()
    {
        return $this->hasOne(Objects::class, ['id' => 'idObject']);
    }

    /**
     * Gets query for [[Memberships]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\MembershipsQuery
     */
    public function getMemberships()
    {
        return $this->hasMany(Memberships::class, ['guildTitle' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\GuildTitleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\GuildTitleQuery(get_called_class());
    }
}
