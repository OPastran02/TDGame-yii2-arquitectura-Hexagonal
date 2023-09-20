<?php

declare(strict_types=1);

namespace api\Core\General\GuildTitle\Application\Query;

use api\Core\General\GuildTitle\Domain\GuildTitle;
use api\Core\General\GuildTitle\Domain\Repository\IGuildTitleRepository;

class GetGuildTitleByIdHandler
{
    private IGuildTitleRepository $repository;

    public function __construct(IGuildTitleRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $id): ?GuildTitle
    {
        $hero = $this->repository->getbyId($id);
        return $hero;
    }
}