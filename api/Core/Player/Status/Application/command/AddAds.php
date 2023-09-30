<?php   

declare(strict_types=1);

namespace api\Core\Player\Status\Application\Command;

use api\Core\Player\Status\Domain\{
    Repository\IStatusRepository,
    Status
};
use api\Core\Player\Status\Application\Query\GetStatus;
use api\Core\Player\Status\Application\Exceptions\DailyAdsReachedException;
use api\Core\Player\Status\Application\Helpers\DailyAdsReached;

final class AddAds
{
    private IStatusRepository $repository;
    private GetStatus $getStatus;

    public function __construct(IStatusRepository $repository){
        $this->repository = $repository;
        $this->getStatus = new GetStatus($repository);
    }

    public function __invoke($statusId): Status
    {
        $arr = ($this->getStatus)($statusId)->toPrimitives();
        $reached = (new DailyAdsReached($arr['dailyAdsViewed']))();
        if($reached) throw new DailyAdsReachedException($arr['dailyAdsViewed']);
            
        $arr['dailyAdsViewed']++; 
        $arr['adsViewed']++; 
        return $this->repository->addAds($arr);
    }
}