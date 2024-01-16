<?php

namespace api\Core\General\Land\Domain\Repository;

use api\Core\General\Land\Domain\Land;

interface ILandWriteRepository
{
    public function create(Land $land): void;
}