<?php

declare(strict_types=1);

namespace api\Core\Rank\Rank\Domain;

use api\Shared\Domain\Collection;

final class Ranks extends Collection
{
    protected function type(): string
    {
        return Rank::class;
    }
}