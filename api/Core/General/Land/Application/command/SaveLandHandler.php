<?php   

declare(strict_types=1);

namespace api\Core\General\Land\Application\Command;

use api\Core\General\Land\Domain\Repository\ILandRepository;
use api\Core\General\Land\Domain\Land;


use DateTime;

final class SaveLandHandler
{
    private ILandRepository $repository;

    public function __construct(ILandRepository $repository){
        $this->repository = $repository;
    }

    public function __invoke($arr): Land
    {
        $id=$this->repository->save($arr);
        return $id;
    }
}