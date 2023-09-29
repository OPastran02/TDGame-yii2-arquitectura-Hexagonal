<?php   

declare(strict_types=1);

namespace api\Core\General\Rarity\Domain\Repository;

use api\Core\General\Rarity\Domain\Rarity;

interface IRarityRepository
{
    public function get(int $id): ?Rarity;
}