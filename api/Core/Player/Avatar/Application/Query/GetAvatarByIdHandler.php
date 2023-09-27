<?php

declare(strict_types=1);

namespace api\Core\Player\Avatar\Application\Query;

use api\Core\Player\Avatar\Domain\Avatar;
use api\Core\Player\Avatar\Domain\Repository\IAvatarRepository;

class GetAvatarByIdHandler
{
    private IAvatarRepository $repository;

    public function __construct(IAvatarRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(string $id): ?Avatar
    {
        $obj = $this->repository->getbyId($id);
        return $obj;
    }
}