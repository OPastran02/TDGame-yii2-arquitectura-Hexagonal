<?php

declare(strict_types=1);

namespace api\Core\Player\Player\Domain;

use api\Shared\Domain\Collection;

final class Players extends Collection
{
    protected function type(): string
    {
        return Player::class;
    }
}