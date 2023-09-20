<?php

declare(strict_types=1);

namespace api\Core\General\Membership\Infrastructure\Persistence\ActiveRecord;

use api\Core\General\Membership\Domain\Membership;
use api\Core\General\Membership\Domain\Memberships;
use api\Core\General\Membership\Domain\Repository\IMembershipRepository;
use common\models\Membership as Model;

class MembershipRepositoryActiveRecord implements IMembershipRepository
{
    public function getbyId(int $id): ?Membership
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return Membership::fromPrimitives(...$model["attributes"]);
        }
    }
}
