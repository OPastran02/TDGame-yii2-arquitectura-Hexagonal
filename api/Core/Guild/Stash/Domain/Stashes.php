<?php

declare(strict_types=1);

namespace api\Core\Guild\Stash\Domain;

use api\Shared\Domain\Collection;

final class Stashes extends Collection
{
    protected function type(): string
    {
        return Stash::class;
    }
}