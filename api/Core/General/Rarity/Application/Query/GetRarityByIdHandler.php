<?php

declare(strict_types=1);

namespace api\Core\General\Rarity\Application\Query;

use api\Core\General\Rarity\Domain\Rarity;
use api\Core\General\Rarity\Domain\Repository\IRarityRepository;

class GetRarityByIdHandler
{
    private IRarityRepository $repository;

    public function __construct(IRarityRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $id): ?Rarity
    {
        $hero = $this->repository->getbyId($id);
        return $hero;
    }
}