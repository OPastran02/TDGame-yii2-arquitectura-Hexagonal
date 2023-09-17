<?php

declare(strict_types=1);

namespace api\Core\General\Boost\Domain;

use api\Shared\Domain\Collection;

final class Boosts extends Collection
{
    protected function type(): string
    {
        return Boost::class;
    }
}