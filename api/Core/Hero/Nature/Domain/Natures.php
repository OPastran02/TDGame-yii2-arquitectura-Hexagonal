<?php

declare(strict_types=1);

namespace api\Core\Hero\Nature\Domain;

use api\Shared\Domain\Collection;

final class Natures extends Collection
{
    protected function type(): string
    {
        return Nature::class;
    }
}