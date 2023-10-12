<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%chaptermobs}}".
 *
 * @property int $id
 * @property int $idObject
 * @property int|null $idChapterLand
 * @property string $stats
 * @property int $available
 *
 * @property Chapterlands $idChapterLand0
 * @property Objects $idObject0
 * @property Stats $stats0
 */
class ChapterMob extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%chaptermobs}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idObject', 'stats'], 'required'],
            [['idChapterLand', 'available'], 'integer'],
            [['idObject'], 'string', 'max' => 36],
            [['idStats'], 'string', 'max' => 36],
            [['idChapterLand'], 'exist', 'skipOnError' => true, 'targetClass' => Chapterland::class, 'targetAttribute' => ['idChapterLand' => 'id']],
            [['idObject'], 'exist', 'skipOnError' => true, 'targetClass' => Objects::class, 'targetAttribute' => ['idObject' => 'id']],
            [['stats'], 'exist', 'skipOnError' => true, 'targetClass' => Stat::class, 'targetAttribute' => ['stats' => 'id']],
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
            'idChapterLand' => 'Id Chapter Land',
            'idStats' => 'Stats',
            'available' => 'Available',
        ];
    }


    public function getChapterLand()
    {
        return $this->hasOne(Chapterland::class, ['id' => 'idChapterLand']);
    }

    public function getObject()
    {
        return $this->hasOne(Objects::class, ['id' => 'idObject']);
    }

    public function getStats()
    {
        return $this->hasOne(Stat::class, ['id' => 'idStats']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ChapterMobQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ChapterMobQuery(get_called_class());
    }
}
