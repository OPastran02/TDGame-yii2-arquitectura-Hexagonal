<?php

declare(strict_types=1);

namespace api\Core\General\Rarity\Application\Query;

use api\Core\General\Rarity\Domain\{
    Rarity,
    Repository\IRarityRepository
};

class GetRarity
{
    private IRarityRepository $repository;

    public function __construct(IRarityRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $rarityId): ?Rarity
    {
        $hero = $this->repository->get($rarityId);
        return $hero;
    }
}