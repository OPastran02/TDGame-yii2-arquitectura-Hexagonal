<?php   

declare(strict_types=1);

namespace api\Core\AvailableHeroes\Application\Command;

use api\Core\AvailableHeroes\Domain\Repository\IAvailableHeroRepository;
use api\Core\AvailableHeroes\Domain\AvailableHero;


use DateTime;

final class SaveAHeroHandler
{
    private IAvailableHeroRepository $repository;

    public function __construct(IAvailableHeroRepository $repository){
        $this->repository = $repository;
    }

    public function __invoke($arr){
        $id=$this->repository->save($arr);
        return $id;
    }
}