<?php

declare(strict_types=1);

namespace api\Core\General\Requirement\Infrastructure\Persistence\ActiveRecord;

use api\Core\General\Requirement\Domain\{
    Requirement,
    Repository\IRequirementRepository
};
use common\models\Requirement as Model;

class RequirementRepositoryActiveRecord implements IRequirementRepository
{
    public function get(int $requirementId): ?Requirement
    {
        $model = Model::findOne($requirementId);
        if (!$model) return null;
        return Requirement::fromPrimitives(...$model["attributes"]);
    }
}
