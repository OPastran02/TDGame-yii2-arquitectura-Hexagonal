<?php

declare(strict_types=1);

namespace api\Core\Player\RankedMetric\Domain;

use api\Shared\Domain\Collection;

final class RankedMetrics extends Collection
{
    protected function type(): string
    {
        return RankedMetric::class;
    }
}