<?php

declare(strict_types=1);

namespace api\Core\Player\Wallet\Application\Query;

use api\Core\Player\Wallet\Domain\{
    Wallet,
    Repository\IWalletRepository
};

class GetWallet
{
    private IWalletRepository $repository;

    public function __construct(IWalletRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(string $walletId): ?Wallet
    {
        return $this->repository->get($walletId);
    }
}