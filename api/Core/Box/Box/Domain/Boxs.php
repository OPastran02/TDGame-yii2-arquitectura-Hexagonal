<?php

declare(strict_types=1);

namespace api\Core\Box\Box\Domain;

use api\Shared\Domain\Collection;

final class Boxs extends Collection
{
    protected function type(): string
    {
        return Monster::class;
    }
}