<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Rarity]].
 *
 * @see \common\models\Rarity
 */
class RarityQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Rarity[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Rarity|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
