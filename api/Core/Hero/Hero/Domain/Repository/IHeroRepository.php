<?php   

namespace api\Core\Hero\Hero\Domain\Repository;

use api\Core\Hero\Hero\Domain\Hero;

interface IHeroRepository
{
    public function get(int $heroId): ?Box;
}