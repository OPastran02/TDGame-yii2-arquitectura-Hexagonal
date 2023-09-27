<?php

declare(strict_types=1);

namespace api\Core\Hero\Ability\Infrastructure\Persistence\ActiveRecord;

use api\Core\Hero\Ability\Domain\Ability;
use api\Core\Hero\Ability\Domain\Abilities;
use api\Core\Hero\Ability\Domain\Repository\IAbilityRepository;
use api\Core\General\Object\Domain\Objeto; 
use common\models\Ability as Model;

class AbilityRepositoryActiveRecord implements IAbilityRepository
{
    public function getbyId(int $id): ?Ability
    {

        $model = Model::find()
            ->with('object')
            ->where(['id' => $id])
            ->one();

        if (!$model) {
            return null;
        }

        $objeto = Objeto::fromPrimitives(...$model["object"]["attributes"]);

        return Ability::fromPrimitives(
            $model['id'],
            $model['idObject'],
            $model['blockAttack'],
            $model['melee'],
            $model['fly'],
            $model['ranged'],
            $model['stealth'],
            $model['available'],
            $objeto,
        );
    }
}
