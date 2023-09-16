<?php

declare(strict_types=1);

namespace api\Core\AvailableHeroes\Application\Query;

use api\Core\AvailableHeroes\Domain\AvailableHero;
use api\Core\AvailableHeroes\Domain\Repository\IAvailableHeroRepository;
use api\Core\AvailableHeroes\Domain\ValueObjects\AvailableHeroId;
use api\Core\AvailableHeroes\Domain\Exceptions\AvailableHeroesNotFound;

class GetAHeroByIdHandler
{
    private IAvailableHeroRepository $repository;

    public function __construct(IAvailableHeroRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $id): ?AvailableHero
    {
        $hero = $this->repository->getbyId($id);
        return $hero;
    }
}