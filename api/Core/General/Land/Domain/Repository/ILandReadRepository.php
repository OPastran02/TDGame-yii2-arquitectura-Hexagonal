<?php

namespace api\Core\General\Land\Domain\Repository;

use api\Core\General\Land\Domain\Land;

interface ILandReadRepository
{
    public function get(string $id): ?Land;
}