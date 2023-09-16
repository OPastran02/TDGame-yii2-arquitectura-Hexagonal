<?php

declare(strict_types=1);

namespace api\Core\General\Stat\Domain;

use api\Shared\Domain\Collection;

final class Stats extends Collection
{
    protected function type(): string
    {
        return Stat::class;
    }
}