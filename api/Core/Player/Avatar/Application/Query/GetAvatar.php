<?php

declare(strict_types=1);

namespace api\Core\Player\Avatar\Application\Query;

use api\Core\Player\Avatar\Domain\{
    Avatar,
    Repository\IAvatarRepository
};

class GetAvatar
{
    private IAvatarRepository $repository;

    public function __construct(IAvatarRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(string $avatarId): ?Avatar
    {
        return $this->repository->get($avatarId);
    }
}