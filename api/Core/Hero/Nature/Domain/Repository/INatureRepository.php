<?php   

namespace api\Core\Hero\Nature\Domain\Repository;

use api\Core\Hero\Nature\Domain\Nature;

interface INatureRepository
{
    public function get(int $natureId): ?Nature;
}