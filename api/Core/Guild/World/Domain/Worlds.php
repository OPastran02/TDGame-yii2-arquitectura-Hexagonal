<?php

declare(strict_types=1);

namespace api\Core\Guild\World\Domain;

use api\Shared\Domain\Collection;

final class Worlds extends Collection
{
    protected function type(): string
    {
        return World::class;
    }
}