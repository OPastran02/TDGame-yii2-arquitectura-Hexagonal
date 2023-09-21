<?php

declare(strict_types=1);

namespace api\Core\Chapter\Chapter\Domain;

use api\Shared\Domain\Collection;

final class Chapters extends Collection
{
    protected function type(): string
    {
        return Chapter::class;
    }
}