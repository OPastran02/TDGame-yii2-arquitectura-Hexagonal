<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Rank]].
 *
 * @see \common\models\Rank
 */
class RankQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Rank[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Rank|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
