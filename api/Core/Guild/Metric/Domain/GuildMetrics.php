<?php

declare(strict_types=1);

namespace api\Core\Guild\GuildMetric\Domain;

use api\Shared\Domain\Collection;

final class GuildMetrics extends Collection
{
    protected function type(): string
    {
        return GuildMetric::class;
    }
}