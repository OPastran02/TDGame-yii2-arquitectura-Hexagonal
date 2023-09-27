<?php   

namespace api\Core\Player\Wallet\Domain\Repository;

use api\Core\Player\Wallet\Domain\Wallet;
use api\Core\Player\Wallet\Domain\Wallets;

interface IWalletRepository
{
    public function getbyId(string $id): ?Wallet;
}