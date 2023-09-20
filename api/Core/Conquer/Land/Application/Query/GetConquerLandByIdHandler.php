<?php

declare(strict_types=1);

namespace api\Core\Conquer\Land\Application\Query;

use api\Core\Conquer\Land\Domain\ConquerLand;
use api\Core\Conquer\Land\Domain\Repository\IConquerLandRepository;

class GetConquerByIdHandler
{
    private IConquerLandRepository $repository;

    public function __construct(IConquerLandRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $id): ?ConquerLand
    {
        $hero = $this->repository->getbyId($id);
        return $hero;
    }
}