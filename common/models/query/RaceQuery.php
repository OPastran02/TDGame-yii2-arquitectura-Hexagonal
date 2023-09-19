<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Race]].
 *
 * @see \common\models\Race
 */
class RaceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Race[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Race|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
