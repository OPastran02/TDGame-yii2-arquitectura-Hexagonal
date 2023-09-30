<?php   

declare(strict_types=1);

namespace api\Core\Player\Status\Application\Command;

use api\Core\Player\Status\Domain\{
    Repository\IStatusRepository,
    Status
};
use api\Core\Player\Status\Application\Query\GetStatus;

final class UpdateUltraPass
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
        $arr['ultraPass'] = ($arr['ultraPass'] == 0) ? 1 : 0;
        return $this->repository->updateUltraPass($arr);
    }
}