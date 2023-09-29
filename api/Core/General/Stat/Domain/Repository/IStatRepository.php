<?php   

namespace api\Core\General\Stat\Domain\Repository;

use api\Core\General\Stat\Domain\{
    Stat,
    Stats
};

interface IStatRepository
{
    /*
    *what can i do with an Stat?
    *Every time a hero, mob or monster is created, it will create a set of random stats.
    *
    *can get stat by id
    *and createStat
    */
    
    public function save($stat): Stat;

    public function get(string $statId): ?Stat;

}