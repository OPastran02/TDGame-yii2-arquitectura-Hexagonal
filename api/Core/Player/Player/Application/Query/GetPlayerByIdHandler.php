<?php

declare(strict_types=1);

namespace api\Core\Player\Player\Application\Query;

use api\Core\Player\Player\Domain\Player;
use api\Core\Player\Player\Domain\Repository\IPlayerRepository;

class GetPlayerByIdHandler
{
    private IPlayerRepository $repository;

    public function __construct(IPlayerRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $id): ?Player
    {
        $obj = $this->repository->getbyId($id);
        return $obj;
    }
}