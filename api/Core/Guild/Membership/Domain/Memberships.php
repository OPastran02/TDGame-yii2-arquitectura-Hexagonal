<?php

declare(strict_types=1);

namespace api\Core\Guild\Membership\Domain;

use api\Shared\Domain\Collection;

final class Memberships extends Collection
{
    protected function type(): string
    {
        return Membership::class;
    }
}