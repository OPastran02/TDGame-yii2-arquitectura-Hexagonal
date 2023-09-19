<?php

declare(strict_types=1);

namespace api\Core\Hero\Ability\Infrastructure\Persistence\ActiveRecord;

use api\Core\Hero\Ability\Domain\Ability;
use api\Core\Hero\Ability\Domain\Abilities;
use api\Core\Hero\Ability\Domain\Repository\IAbilityRepository;
use common\models\Ability as Model;

class AbilityRepositoryActiveRecord implements IAbilityRepository
{
    public function getbyId(int $id): ?Ability
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return Ability::fromPrimitives(...$model["attributes"]);
        }
    }
}
