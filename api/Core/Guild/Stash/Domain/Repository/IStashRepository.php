<?php   

namespace api\Core\General\Stash\Domain\Repository;

use api\Core\General\Stash\Domain\Stash;
use api\Core\General\Stash\Domain\Stashes;

interface IStashRepository
{
    /*
    *what can i do with a Stash?
    *just get, mandatory
    */
    
    public function getbyId(int $id): ?Stash;


}