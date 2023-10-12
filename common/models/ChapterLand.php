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
            [['idland'], 'exist', 'skipOnError' => true, 'targetClass' => Land::class, 'targetAttribute' => ['idland' => 'id']],
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

    public function getChaptermobs()
    {
        return $this->hasMany(Chaptermobs::class, ['idChapterLand' => 'id']);
    }

    public function getchapter()
    {
        return $this->hasOne(Chapters::class, ['id' => 'idchapter']);
    }


    public function getland()
    {
        return $this->hasOne(Land::class, ['id' => 'idland']);
    }

    public static function find()
    {
        return new \common\models\query\ChapterLandQuery(get_called_class());
    }
}
