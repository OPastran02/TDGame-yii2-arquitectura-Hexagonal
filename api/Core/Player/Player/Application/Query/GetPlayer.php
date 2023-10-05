<?php

declare(strict_types=1);

namespace api\Core\Player\Player\Application\Query;

use api\Core\Player\Player\Domain\{
    Player,
    Repository\IPlayerRepository
};

class GetPlayer
{
    private IPlayerRepository $repository;

    public function __construct(IPlayerRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(string $playerId): ?Player
    {
        return $this->repository->get($playerId);
    }
}