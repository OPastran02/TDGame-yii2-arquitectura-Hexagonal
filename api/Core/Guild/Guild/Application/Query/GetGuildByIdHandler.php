<?php

declare(strict_types=1);

namespace api\Core\Guild\Guild\Application\Query;

use api\Core\Guild\Guild\Domain\Guild;
use api\Core\Guild\Guild\Domain\Repository\IGuildRepository;

class GetGuildByIdHandler
{
    private IGuildRepository $repository;

    public function __construct(IGuildRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $id): ?Guild
    {
        $obj = $this->repository->getbyId($id);
        return $obj;
    }
}