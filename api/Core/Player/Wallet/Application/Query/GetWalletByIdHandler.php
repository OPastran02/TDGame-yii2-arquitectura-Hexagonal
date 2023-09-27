<?php

declare(strict_types=1);

namespace api\Core\Player\Wallet\Application\Query;

use api\Core\Player\Wallet\Domain\Wallet;
use api\Core\Player\Wallet\Domain\Repository\IWalletRepository;

class GetWalletByIdHandler
{
    private IWalletRepository $repository;

    public function __construct(IWalletRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(string $id): ?Wallet
    {
        $obj = $this->repository->getbyId($id);
        return $obj;
    }
}