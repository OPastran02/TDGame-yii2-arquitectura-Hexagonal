<?php   

declare(strict_types=1);

namespace api\Core\Player\Wallet\Application\Command;

use api\Core\Player\Wallet\Domain\{
    Repository\IWalletRepository,
    Wallet
};
use api\Core\Player\Wallet\Application\Query\GetWallet;


final class AddMoney
{
    private IWalletRepository $repository;
    private GetWallet $getWallet;

    public function __construct(IWalletRepository $repository){
        $this->repository = $repository;
        $this->getWallet = new GetWallet($repository);
    }

    public function __invoke($statusId,$type,$value): Wallet
    {
        $arr = ($this->getWallet)($statusId)->toPrimitives();
        $arr[$type] += $value;
        return $this->repository->addMoney($arr);
    }
}