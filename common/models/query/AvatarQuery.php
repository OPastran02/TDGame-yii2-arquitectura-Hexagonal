<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Avatar]].
 *
 * @see \common\models\Avatar
 */
class AvatarQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Avatar[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Avatar|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
