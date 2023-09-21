<?php

declare(strict_types=1);

namespace api\Core\Chapter\Mob\Domain;

use api\Shared\Domain\Collection;

final class ChapterMobs extends Collection
{
    protected function type(): string
    {
        return ChapterMob::class;
    }
}