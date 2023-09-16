<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Objeto]].
 *
 * @see \common\models\Objeto
 */
class ObjetosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Objeto[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Objeto|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
