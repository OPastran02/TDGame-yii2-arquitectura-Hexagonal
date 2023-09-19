<?php

declare(strict_types=1);

namespace api\Core\Player\Metric\Domain;

use api\Shared\Domain\Collection;

final class Metrics extends Collection
{
    protected function type(): string
    {
        return Metric::class;
    }
}