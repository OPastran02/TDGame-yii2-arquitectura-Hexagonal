<?php

declare(strict_types=1);

namespace api\Core\General\Shop\Infrastructure\Persistence\ActiveRecord;

use api\Core\General\Shop\Domain\Shop;
use api\Core\General\Shop\Domain\Shops;
use api\Core\General\Shop\Domain\Repository\IShopRepository;
use common\models\Shop as Model;

class ShopRepositoryActiveRecord implements IShopRepository
{
    public function getbyId(int $id): ?Shop
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return Shop::fromPrimitives(...$model["attributes"]);
        }
    }
}
