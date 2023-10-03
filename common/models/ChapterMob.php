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
            [['stats'], 'string', 'max' => 36],
            [['idChapterLand'], 'exist', 'skipOnError' => true, 'targetClass' => Chapterlands::class, 'targetAttribute' => ['idChapterLand' => 'id']],
            [['idObject'], 'exist', 'skipOnError' => true, 'targetClass' => Objects::class, 'targetAttribute' => ['idObject' => 'id']],
            [['stats'], 'exist', 'skipOnError' => true, 'targetClass' => Stats::class, 'targetAttribute' => ['stats' => 'id']],
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
            'stats' => 'Stats',
            'available' => 'Available',
        ];
    }

    /**
     * Gets query for [[IdChapterLand0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ChapterlandsQuery
     */
    public function getIdChapterLand0()
    {
        return $this->hasOne(Chapterlands::class, ['id' => 'idChapterLand']);
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
     * Gets query for [[Stats0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\StatsQuery
     */
    public function getStats0()
    {
        return $this->hasOne(Stats::class, ['id' => 'stats']);
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
