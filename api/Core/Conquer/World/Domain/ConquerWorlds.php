<?php

declare(strict_types=1);

namespace api\Core\Conquer\World\Domain;

use api\Shared\Domain\Collection;

final class ConquerWorlds extends Collection
{
    protected function type(): string
    {
        return ConquerWorld::class;
    }
}