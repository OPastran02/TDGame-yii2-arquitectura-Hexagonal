<?php   

declare(strict_types=1);

namespace api\Core\Player\Status\Application\Command;

use api\Core\Player\Status\Domain\{
    Repository\IStatusRepository,
    Status
};

final class CreateStatus
{
    private IStatusRepository $repository;

    public function __construct(IStatusRepository $repository){
        $this->repository = $repository;
    }

    public function __invoke($statusId): Status
    {
        $arr=[];
        $arr['id']                = $statusId;
        $arr['honor']             = 0;
        $arr['lastLogin']         = 0;
        $arr['battlePass']        = 0;
        $arr['ultraPass']         = 0;
        $arr['dailyAdsViewed']    = 0;
        $arr['adsViewed']         = 0;
        $arr['active']            = 1;
        $arr['available']         = 1; 

        return $this->repository->create($arr);
    }
}