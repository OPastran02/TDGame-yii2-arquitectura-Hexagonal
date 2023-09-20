<?php

declare(strict_types=1);

namespace api\Core\Conquer\Conquer\Domain;

use api\Shared\Domain\Collection;

final class Conquers extends Collection
{
    protected function type(): string
    {
        return Conquer::class;
    }
}