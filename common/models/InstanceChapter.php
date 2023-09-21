<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%instancechapters}}".
 *
 * @property int $id
 * @property string $idPlayer
 * @property int $idChapter
 * @property int $finished
 * @property int $amountOfFinished
 * @property int $maxStars
 * @property int $available
 *
 * @property Chapters $idChapter0
 * @property Players $idPlayer0
 */
class InstanceChapter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%instancechapters}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPlayer', 'idChapter'], 'required'],
            [['idChapter', 'finished', 'amountOfFinished', 'maxStars', 'available'], 'integer'],
            [['idPlayer'], 'string', 'max' => 36],
            [['idChapter'], 'exist', 'skipOnError' => true, 'targetClass' => Chapters::class, 'targetAttribute' => ['idChapter' => 'id']],
            [['idPlayer'], 'exist', 'skipOnError' => true, 'targetClass' => Players::class, 'targetAttribute' => ['idPlayer' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idPlayer' => 'Id Player',
            'idChapter' => 'Id Chapter',
            'finished' => 'Finished',
            'amountOfFinished' => 'Amount Of Finished',
            'maxStars' => 'Max Stars',
            'available' => 'Available',
        ];
    }

    /**
     * Gets query for [[IdChapter0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ChaptersQuery
     */
    public function getIdChapter0()
    {
        return $this->hasOne(Chapters::class, ['id' => 'idChapter']);
    }

    /**
     * Gets query for [[IdPlayer0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\PlayersQuery
     */
    public function getIdPlayer0()
    {
        return $this->hasOne(Players::class, ['id' => 'idPlayer']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\InstanceChapterQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\InstanceChapterQuery(get_called_class());
    }
}
