<?php

declare(strict_types=1);

namespace api\Core\Guild\Guild\Domain;

use api\Shared\Domain\Collection;

final class Guilds extends Collection
{
    protected function type(): string
    {
        return Guild::class;
    }
}