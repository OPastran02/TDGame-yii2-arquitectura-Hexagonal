<?php

declare(strict_types=1);

namespace api\Core\AvailableHeroes\Application\Command;

use api\Core\AvailableHeroes\Domain\AvailableHero;
use api\Core\AvailableHeroes\Domain\Repository\AvailableHeroesRepositoryInterface;
use api\Core\AvailableHeroes\Domain\ValueObjects\AvailableHeroId;
use api\Core\AvailableHeroes\Domain\Exceptions\AvailableHeroesNotFound;

final class AvailableHeroesDelete
{ 
    private AvailableHeroesRepositoryInterface $repository;
    private int $id;

    public function __construct(AvailableHeroesRepositoryInterface $repository,$id){
        $this->repository = $repository;
        $this->id=$id;
    }

    public function __invoke(): void
    {
        $availableHero = $this->repository->getbyId($this->id);
        if (null === $availableHero) throw new AvailableHeroNotFound($this->id);
        $this->repository->delete($this->id); 
    }
}