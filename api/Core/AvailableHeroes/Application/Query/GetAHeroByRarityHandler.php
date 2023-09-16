<?php

declare(strict_types=1);

namespace api\Core\AvailableHeroes\Application\Query;

use api\Core\AvailableHeroes\Domain\AvailableHeroes;
use api\Core\AvailableHeroes\Domain\Repository\IAvailableHeroRepository;


class GetAHeroByRarityHandler
{
    private IAvailableHeroRepository $repository;

    public function __construct(IAvailableHeroRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $rarity): ?AvailableHeroes
    {
        $heroes = $this->repository->getByrarity($id);
        return $heroes;
    }
}