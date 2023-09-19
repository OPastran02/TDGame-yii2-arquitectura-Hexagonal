<?php

declare(strict_types=1);

namespace api\Core\Player\Wallet\Infrastructure\Persistence\ActiveRecord;

use api\Core\Player\Wallet\Domain\Wallet;
use api\Core\Player\Wallet\Domain\Wallets;
use api\Core\Player\Wallet\Domain\Repository\IWalletRepository;
use common\models\Wallet as Model;

class WalletRepositoryActiveRecord implements IWalletRepository
{
    public function getbyId(int $id): ?Wallet
    {
        $model = Model::findOne($id);

        if (!$model) {
            return null;
        }else{
            return Wallet::fromPrimitives(...$model["attributes"]);
        }
    }
}
