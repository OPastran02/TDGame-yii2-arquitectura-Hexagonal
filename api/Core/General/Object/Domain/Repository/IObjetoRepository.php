<?php   

namespace api\Core\General\Object\Domain\Repository;

use api\Core\General\Object\Domain\{
    Objeto,
    Objetos
};

interface IObjetoRepository
{   
    public function get(string $objetoId): ?Objeto;
    public function create($objeto): ?Objeto;
}