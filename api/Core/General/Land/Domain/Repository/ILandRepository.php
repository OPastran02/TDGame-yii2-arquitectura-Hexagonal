<?php   

namespace api\Core\General\Land\Domain\Repository;

use api\Core\General\Land\Domain\Land;

interface ILandRepository
{
    public function create(Land $land): void;
    public function get(string $id): ?Land;
}


