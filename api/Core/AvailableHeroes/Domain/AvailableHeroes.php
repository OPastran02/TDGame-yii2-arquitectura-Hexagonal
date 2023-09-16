<?php

declare(strict_types=1);

namespace api\Core\AvailableHeroes\Domain;

use api\Shared\Domain\Collection;

final class AvailableHeroes extends Collection
{
    protected function type(): string
    {
        return AvailableHero::class;
    }
}