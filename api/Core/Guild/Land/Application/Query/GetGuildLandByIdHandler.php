<?php

declare(strict_types=1);

namespace api\Core\General\GuildLand\Application\Query;

use api\Core\General\GuildLand\Domain\GuildLand;
use api\Core\General\GuildLand\Domain\Repository\IGuildLandRepository;

class GetGuildLandByIdHandler
{
    private IGuildLandRepository $repository;

    public function __construct(IGuildLandRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $id): ?GuildLand
    {
        $hero = $this->repository->getbyId($id);
        return $hero;
    }
}