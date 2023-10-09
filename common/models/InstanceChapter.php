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
            [['idChapter'], 'exist', 'skipOnError' => true, 'targetClass' => Chapter::class, 'targetAttribute' => ['idChapter' => 'id']],
            [['idPlayer'], 'exist', 'skipOnError' => true, 'targetClass' => Player::class, 'targetAttribute' => ['idPlayer' => 'id']],
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

    public function getChapter()
    {
        return $this->hasOne(Chapter::class, ['id' => 'idChapter']);
    }

    public function getPlayer()
    {
        return $this->hasOne(Player::class, ['id' => 'idPlayer']);
    }

    public static function find()
    {
        return new \common\models\query\InstanceChapterQuery(get_called_class());
    }
}
