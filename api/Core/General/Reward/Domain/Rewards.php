<?php

declare(strict_types=1);

namespace api\Core\General\Reward\Domain;

use api\Shared\Domain\Collection;

final class Rewards extends Collection
{
    protected function type(): string
    {
        return Reward::class;
    }
}