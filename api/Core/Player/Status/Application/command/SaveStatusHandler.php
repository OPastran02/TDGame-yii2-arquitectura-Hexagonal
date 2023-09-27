<?php   

declare(strict_types=1);

namespace api\Core\Player\Status\Application\Command;

use api\Core\Player\Status\Domain\Repository\IStatusRepository;
use api\Core\Player\Status\Domain\Status;


use DateTime;

final class SaveStatusHandler
{
    private IStatusRepository $repository;

    public function __construct(IStatusRepository $repository){
        $this->repository = $repository;
    }

    public function __invoke($arr): Land
    {
        $id=$this->repository->save($arr);
        return $id;
    }
}