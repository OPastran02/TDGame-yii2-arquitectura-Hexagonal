<?php   

namespace api\Core\Box\Box\Domain\Repository;

use api\Core\Box\Box\Domain\Box;

interface IBoxRepository
{
    public function getbyId(int $id): ?Box;
}