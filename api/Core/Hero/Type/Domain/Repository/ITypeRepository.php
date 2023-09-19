<?php   

namespace api\Core\Hero\Type\Domain\Repository;

use api\Core\Hero\Type\Domain\Type;
use api\Core\Hero\Type\Domain\Types;

interface ITypeRepository
{
    /*
    *what can i do with a Type?
    *just get, mandatory
    */
    
    public function getbyId(int $id): ?Type;


}