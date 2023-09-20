<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\GuildMetric]].
 *
 * @see \common\models\GuildMetric
 */
class GuildmetricsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\GuildMetric[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\GuildMetric|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
