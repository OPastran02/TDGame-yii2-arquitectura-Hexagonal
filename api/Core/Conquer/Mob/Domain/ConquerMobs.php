<?php

declare(strict_types=1);

namespace api\Core\Conquer\Mob\Domain;

use api\Shared\Domain\Collection;

final class ConquerMobs extends Collection
{
    protected function type(): string
    {
        return ConquerMob::class;
    }
}