<?php

declare(strict_types=1);

namespace api\Core\Guild\GuildLand\Domain;

use api\Shared\Domain\Collection;

final class GuildLands extends Collection
{
    protected function type(): string
    {
        return GuildLand::class;
    }
}