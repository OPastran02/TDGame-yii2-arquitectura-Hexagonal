<?php

declare(strict_types=1);

namespace api\Core\General\Land\Domain;

use api\Shared\Domain\Collection;

final class Lands extends Collection
{
    protected function type(): string
    {
        return Land::class;
    }
}