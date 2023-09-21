<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%chapterlands}}".
 *
 * @property int $id
 * @property int $idchapter
 * @property string $idland
 * @property int $available
 *
 * @property Chaptermobs[] $chaptermobs
 * @property Chapters $idchapter0
 * @property Lands $idland0
 */
class ChapterLand extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%chapterlands}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idchapter', 'idland'], 'required'],
            [['idchapter', 'available'], 'integer'],
            [['idland'], 'string', 'max' => 36],
            [['idchapter'], 'exist', 'skipOnError' => true, 'targetClass' => Chapters::class, 'targetAttribute' => ['idchapter' => 'id']],
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
            'idchapter' => 'Idchapter',
            'idland' => 'Idland',
            'available' => 'Available',
        ];
    }

    /**
     * Gets query for [[Chaptermobs]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ChaptermobsQuery
     */
    public function getChaptermobs()
    {
        return $this->hasMany(Chaptermobs::class, ['idChapterLand' => 'id']);
    }

    /**
     * Gets query for [[Idchapter0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ChaptersQuery
     */
    public function getIdchapter0()
    {
        return $this->hasOne(Chapters::class, ['id' => 'idchapter']);
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
     * @return \common\models\query\ChapterLandQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ChapterLandQuery(get_called_class());
    }
}
