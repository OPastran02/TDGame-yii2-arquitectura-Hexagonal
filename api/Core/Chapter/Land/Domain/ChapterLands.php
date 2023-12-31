<?php

declare(strict_types=1);

namespace api\Core\Chapter\Land\Domain;

use api\Shared\Domain\Collection;

final class ChapterLands extends Collection
{
    protected function type(): string
    {
        return ChapterLand::class;
    }
}