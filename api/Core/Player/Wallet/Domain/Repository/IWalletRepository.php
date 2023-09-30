<?php   

namespace api\Core\Player\Wallet\Domain\Repository;

use api\Core\Player\Wallet\Domain\Wallet;

interface IWalletRepository
{
    public function get(string $id): ?Wallet;
    public function create($wallet): ?Wallet;
    public function addMoney($wallet): ?Wallet;
}