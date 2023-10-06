<?php   

namespace api\Core\Monster\Monster\Domain\Repository;

use api\Core\Monster\Monster\Domain\Monster;

interface IMonsterRepository
{
    public function get(int $monsterId): ?Monster;
}