<?php   

declare(strict_types=1);

namespace api\Core\Player\Wallet\Application\Command;

use api\Core\Player\Wallet\Domain\{
    Repository\IWalletRepository,
    Wallet
};
use Ramsey\Uuid\Uuid;

final class CreateWallet
{
    private IWalletRepository $repository;

    public function __construct(IWalletRepository $repository){
        $this->repository = $repository;
    }

    public function __invoke(): Wallet
    {
        $arr = [];
        $arr['id']                = Uuid::uuid4()->toString();  
        $arr['bronze']            = 0; 
        $arr['silver']            = 0;
        $arr['gold']              = 0; 
        $arr['crystal']           = 0;
        $arr['available']         = 1;

        return $this->repository->create($arr);
    }
}