<?php

declare(strict_types=1);

namespace api\Core\Parcel\Parcel\Infrastructure\Persistence\ActiveRecord;

use api\Core\Parcel\Parcel\Domain\Parcel;
use api\Core\Parcel\Parcel\Domain\Repository\IParcelRepository;
use common\models\Parcel as Model;

class ParcelRepositoryActiveRecord implements IParcelRepository
{
    public function getbyId(int $id): ?Parcel
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return Parcel::fromPrimitives(...$model["attributes"]);
        }
    }
}
