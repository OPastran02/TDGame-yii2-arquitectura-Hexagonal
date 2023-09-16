<?php   

namespace api\Core\General\Object\Domain\Repository;

use api\Core\General\Object\Domain\Objeto;
use api\Core\General\Object\Domain\Objetos;

interface IObjetoRepository
{
    /*
    *what can i do with an objeto?
    *just get it by id, because its the visual parameters of another entity.
    *
    *get by Available?
    */
    
    public function getbyId(int $id): ?Objeto;

}