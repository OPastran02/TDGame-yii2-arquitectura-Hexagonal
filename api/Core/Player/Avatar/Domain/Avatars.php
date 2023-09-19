<?php

declare(strict_types=1);

namespace api\Core\Player\Avatar\Domain;

use api\Shared\Domain\Collection;

final class Avatars extends Collection
{
    protected function type(): string
    {
        return Avatar::class;
    }
}