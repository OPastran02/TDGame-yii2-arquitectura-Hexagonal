<?php

declare(strict_types=1);

namespace api\Core\Hero\Race\Domain;

use api\Shared\Domain\Collection;

final class Races extends Collection
{
    protected function type(): string
    {
        return Race::class;
    }
}