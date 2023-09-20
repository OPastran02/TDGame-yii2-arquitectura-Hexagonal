<?php

declare(strict_types=1);

namespace api\Core\Conquer\Instance\Infrastructure\Persistence\ActiveRecord;

use api\Core\Conquer\Instance\Domain\InstanceConquer;
use api\Core\Conquer\Instance\Domain\InstanceConquers;
use api\Core\Conquer\Instance\Domain\Repository\IInstanceConquerRepository;
use common\models\InstanceConquer as Model;

class InstanceConquerRepositoryActiveRecord implements IInstanceConquerRepository
{
    public function getbyId(int $id): ?InstanceConquer
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return InstanceConquer::fromPrimitives(...$model["attributes"]);
        }
    }
}
