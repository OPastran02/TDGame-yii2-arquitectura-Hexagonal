<?php

declare(strict_types=1);

namespace api\Core\Player\Avatar\Infrastructure\Persistence\ActiveRecord;

use api\Core\Player\Avatar\Domain\{
    Avatar,
    Repository\IAvatarRepository
};
use api\Core\General\Object\Domain\Objeto;
use common\models\Avatar as Model;

class AvatarRepositoryActiveRecord implements IAvatarRepository
{
    public function get(string $avatarId): ?Avatar
    {
        $model = Model::find()
            ->with('object') 
            ->where(['id' => $avatarId])
            ->one();

        if (!$model) return null;

        $objeto = Objeto::fromPrimitives(...$model["object"]["attributes"]);

        return Avatar::fromPrimitives(
            $model['id'],
            $model['nickname'],
            $model['message'],
            $model['idObject'],
            $model['available'],
            $objeto
        );
    }

    public function create($arr): Avatar
    {
        $model = new Model();
        $model->attributes = $arr;
        if ($model->save()) return $this->get($model["attributes"]["id"]);
    }
}
