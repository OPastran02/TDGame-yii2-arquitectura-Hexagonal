<?php

declare(strict_types=1);

namespace api\Core\Hero\Ability\Domain;

use api\Shared\Domain\Collection;

final class Abilities extends Collection
{
    protected function type(): string
    {
        return Ability::class;
    }
}