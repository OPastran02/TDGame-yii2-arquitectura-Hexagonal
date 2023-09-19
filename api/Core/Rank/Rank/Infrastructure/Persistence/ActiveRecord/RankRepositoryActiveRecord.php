<?php

declare(strict_types=1);

namespace api\Core\Rank\Rank\Infrastructure\Persistence\ActiveRecord;

use api\Core\Rank\Rank\Domain\Rank;
use api\Core\Rank\Rank\Domain\Ranks;
use api\Core\Rank\Rank\Domain\Repository\IRankRepository;
use common\models\Rank as Model;

class RankRepositoryActiveRecord implements IRankRepository
{
    public function getbyId(int $id): ?Rank
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return Rank::fromPrimitives(...$model["attributes"]);
        }
    }
}
