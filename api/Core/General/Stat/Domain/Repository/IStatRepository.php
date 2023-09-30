<?php   

namespace api\Core\General\Stat\Domain\Repository;

use api\Core\General\Stat\Domain\{
    Stat,
    Stats
};

interface IStatRepository
{
    public function save($stat): Stat;
    public function get(string $statId): ?Stat;
}