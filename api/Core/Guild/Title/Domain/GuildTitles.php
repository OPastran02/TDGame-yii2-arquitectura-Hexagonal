<?php

declare(strict_types=1);

namespace api\Core\Guild\Title\Domain;

use api\Shared\Domain\Collection;

final class GuildTitles extends Collection
{
    protected function type(): string
    {
        return GuildTitle::class;
    }
}