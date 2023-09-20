<?php

declare(strict_types=1);

namespace api\Core\General\Stash\Infrastructure\Persistence\ActiveRecord;

use api\Core\General\Stash\Domain\Stash;
use api\Core\General\Stash\Domain\Stashes;
use api\Core\General\Stash\Domain\Repository\IStashRepository;
use common\models\Stash as Model;

class StashRepositoryActiveRecord implements IStashRepository
{
    public function getbyId(int $id): ?Stash
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return Stash::fromPrimitives(...$model["attributes"]);
        }
    }
}
