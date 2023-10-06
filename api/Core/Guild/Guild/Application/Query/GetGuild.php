<?php

declare(strict_types=1);

namespace api\Core\Guild\Guild\Application\Query;

use api\Core\Guild\Guild\Domain\{
    Guild,
    Repository\IGuildRepository
};

class GetGuild
{
    private IGuildRepository $repository;

    public function __construct(IGuildRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $guildId): ?Guild
    {
        return $this->repository->get($guildId);
    }
}