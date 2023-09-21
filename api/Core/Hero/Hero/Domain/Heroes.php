<?php

declare(strict_types=1);

namespace api\Core\Hero\Hero\Domain;

use api\Shared\Domain\Collection;

final class Heros extends Collection
{
    protected function type(): string
    {
        return Hero::class;
    }
}