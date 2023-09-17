<?php

declare(strict_types=1);

namespace api\Core\General\Rarity\Domain;

use api\Shared\Domain\Collection;

final class Rarities extends Collection
{
    protected function type(): string
    {
        return Rarity::class;
    }
}