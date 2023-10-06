<?php

declare(strict_types=1);

namespace api\Core\Guild\title\Application\Query;

use api\Core\Guild\title\Domain\{
    GuildTitle,
    Repository\IGuildTitleRepository
};

class GetGuildTitle
{
    private IGuildTitleRepository $repository;

    public function __construct(IGuildTitleRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $titleId): ?GuildTitle
    {
        return $this->repository->get($titleId);
    }
}