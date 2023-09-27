<?php   

namespace api\Core\Hero\Type\Domain\Repository;

use api\Core\Hero\Type\Domain\Type;

interface ITypeRepository
{
    public function getbyId(int $typeId): ?Type;
}