<?php   

namespace api\Core\General\Land\Domain\Repository;

use api\Core\General\Land\Domain\Land;
use api\Core\General\Land\Domain\Lands;

interface ILandRepository
{
    /*
    *what can i do with an Land?
    *Every time a hero, mob or monster is created, it will create a set of random Lands.
    *
    *can get Land by id
    *and createLand
    */
    
    public function save($Land): Land;

    public function getbyId(string $id): ?Land;

}