<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Reward]].
 *
 * @see \common\models\Reward
 */
class RewardQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Reward[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Reward|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
