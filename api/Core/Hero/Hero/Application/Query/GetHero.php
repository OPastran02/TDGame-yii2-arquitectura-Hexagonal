<?php

declare(strict_types=1);

namespace api\Core\Hero\Hero\Application\Query;

use api\Core\Hero\Hero\Domain\{
    Hero,
    Repository\IHeroRepository
};

class GetHero
{
    private IHeroRepository $repository;

    public function __construct(IHeroRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $heroId): ?Hero
    {
        return $this->repository->get($heroId);
    }
}