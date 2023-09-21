<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%chapters}}".
 *
 * @property int $id
 * @property int $idObject
 * @property int|null $idReward
 * @property int $available
 *
 * @property Chapterlands[] $chapterlands
 * @property Objects $idObject0
 * @property Rewards $idReward0
 * @property Instancechapters[] $instancechapters
 */
class Chapter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%chapters}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idObject'], 'required'],
            [['idObject', 'idReward', 'available'], 'integer'],
            [['idObject'], 'exist', 'skipOnError' => true, 'targetClass' => Objects::class, 'targetAttribute' => ['idObject' => 'id']],
            [['idReward'], 'exist', 'skipOnError' => true, 'targetClass' => Rewards::class, 'targetAttribute' => ['idReward' => 'id']],
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
            'idReward' => 'Id Reward',
            'available' => 'Available',
        ];
    }

    /**
     * Gets query for [[Chapterlands]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ChapterlandsQuery
     */
    public function getChapterlands()
    {
        return $this->hasMany(Chapterlands::class, ['idchapter' => 'id']);
    }

    /**
     * Gets query for [[IdObject0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ObjectsQuery
     */
    public function getIdObject0()
    {
        return $this->hasOne(Objects::class, ['id' => 'idObject']);
    }

    /**
     * Gets query for [[IdReward0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\RewardsQuery
     */
    public function getIdReward0()
    {
        return $this->hasOne(Rewards::class, ['id' => 'idReward']);
    }

    /**
     * Gets query for [[Instancechapters]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\InstancechaptersQuery
     */
    public function getInstancechapters()
    {
        return $this->hasMany(Instancechapters::class, ['idChapter' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ChapterQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ChapterQuery(get_called_class());
    }
}
