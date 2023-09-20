<?php

declare(strict_types=1);

namespace api\Core\Guild\GuildTitle\Domain;

use api\Shared\Domain\Collection;

final class GuildTitlees extends Collection
{
    protected function type(): string
    {
        return GuildTitle::class;
    }
}