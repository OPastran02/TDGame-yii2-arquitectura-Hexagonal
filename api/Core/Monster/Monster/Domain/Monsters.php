<?php

declare(strict_types=1);

namespace api\Core\Monster\Monster\Domain;

use api\Shared\Domain\Collection;

final class Monsters extends Collection
{
    protected function type(): string
    {
        return Monster::class;
    }
}