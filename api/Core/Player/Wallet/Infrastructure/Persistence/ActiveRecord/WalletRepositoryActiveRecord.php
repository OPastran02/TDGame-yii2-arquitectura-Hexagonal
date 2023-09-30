<?php

declare(strict_types=1);

namespace api\Core\Player\Wallet\Infrastructure\Persistence\ActiveRecord;

use api\Core\Player\Wallet\Domain\{
    Wallet,
    Repository\IWalletRepository
};
use common\models\Wallet as Model;

class WalletRepositoryActiveRecord implements IWalletRepository
{
    public function get(string $id): ?Wallet
    {
        $model = Model::findOne($id);
        if ($model) return Wallet::fromPrimitives(...$model["attributes"]);
    }

    public function create($arr): Wallet
    {
        $model = new Model();
        $model->attributes = $arr;
        if ($model->save()) return Wallet::fromPrimitives(...$model->attributes);
    }

    public function addMoney($arr): Wallet
    {
        $model = Model::findOne($arr['id']);
        $model->attributes = $arr;
        if($model->save()) return Wallet::fromPrimitives(...$model->attributes);
    }
}
