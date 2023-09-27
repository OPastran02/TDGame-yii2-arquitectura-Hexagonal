<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%avatars}}".
 *
 * @property string $id
 * @property int $idObject
 * @property int $available
 *
 * @property Objects $idObject0
 * @property Players[] $players
 */
class Avatar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%avatars}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idObject'], 'required'],
            [['idObject', 'available'], 'integer'],
            [['id'], 'string', 'max' => 36],
            [['id'], 'unique'],
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


    public function getPlayers()
    {
        return $this->hasMany(Players::class, ['idavatar' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\AvatarQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\AvatarQuery(get_called_class());
    }
}
