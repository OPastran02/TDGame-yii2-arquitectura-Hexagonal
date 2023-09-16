<?php   

namespace api\Core\AvailableHeroes\Domain\Repository;

use api\Core\AvailableHeroes\Domain\ValueObjects\AvailableHeroId;
use api\Core\AvailableHeroes\Domain\AvailableHero;
use api\Core\AvailableHeroes\Domain\AvailableHeroes;
use api\Shared\Domain\ValueObject\FkId;
use common\models\availablehero as AvailableHeroModel;

interface IAvailableHeroRepository
{
    public function getbyId(int $id): ?AvailableHero;
    
    public function getByrarity(int $id): ?AvailableHeroes;

    public function save($availableHeroes): ?int;

/*
    public function delete(int $id): void;  
    public function update(AvailableHero $availableHeroes): ?int;*/
}