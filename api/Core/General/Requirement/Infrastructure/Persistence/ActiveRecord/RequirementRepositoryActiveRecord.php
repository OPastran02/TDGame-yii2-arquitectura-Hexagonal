<?php

declare(strict_types=1);

namespace api\Core\General\Requirement\Infrastructure\Persistence\ActiveRecord;

use api\Core\General\Requirement\Domain\Requirement;
use api\Core\General\Requirement\Domain\Requirements;
use api\Core\General\Requirement\Domain\Repository\IRequirementRepository;
use common\models\Requirement as Model;

class RequirementRepositoryActiveRecord implements IRequirementRepository
{
    public function getbyId(int $id): ?Requirement
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return Requirement::fromPrimitives(...$model["attributes"]);
        }
    }
}
