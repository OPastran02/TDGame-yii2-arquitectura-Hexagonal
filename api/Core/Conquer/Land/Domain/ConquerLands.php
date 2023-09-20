<?php

declare(strict_types=1);

namespace api\Core\Conquer\Land\Domain;

use api\Shared\Domain\Collection;

final class ConquerLands extends Collection
{
    protected function type(): string
    {
        return ConquerLand::class;
    }
}