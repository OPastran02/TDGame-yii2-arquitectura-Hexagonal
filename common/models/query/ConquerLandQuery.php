<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\ConquerLand]].
 *
 * @see \common\models\ConquerLand
 */
class ConquerLandQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\ConquerLand[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\ConquerLand|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
