<?php   

namespace api\Core\General\Land\Domain\Repository;

use api\Core\General\Land\Domain\Land;

interface ILandRepository
{
    public function get(string $id): ?Land;
    public function create($land): Land; 
}