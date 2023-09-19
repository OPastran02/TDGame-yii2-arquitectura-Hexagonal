<?php   

namespace api\Core\Hero\Nature\Domain\Repository;

use api\Core\Hero\Nature\Domain\Nature;
use api\Core\Hero\Nature\Domain\Natures;

interface INatureRepository
{
    /*
    *what can i do with a Type?
    *just get, mandatory
    */
    
    public function getbyId(int $id): ?Nature;


}