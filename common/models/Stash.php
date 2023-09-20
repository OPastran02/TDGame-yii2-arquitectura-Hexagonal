<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%stashes}}".
 *
 * @property string $id
 * @property int $wood
 * @property int $steel
 * @property int $farm
 * @property int $available
 *
 * @property Guilds $guilds
 */
class Stash extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%stashes}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['wood', 'steel', 'farm', 'available'], 'integer'],
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
            'wood' => 'Wood',
            'steel' => 'Steel',
            'farm' => 'Farm',
            'available' => 'Available',
        ];
    }

    /**
     * Gets query for [[Guilds]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\GuildsQuery
     */
    public function getGuilds()
    {
        return $this->hasOne(Guilds::class, ['stash' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\StashQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\StashQuery(get_called_class());
    }
}
