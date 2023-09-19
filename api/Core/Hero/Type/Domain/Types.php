<?php

declare(strict_types=1);

namespace api\Core\Hero\Type\Domain;

use api\Shared\Domain\Collection;

final class Types extends Collection
{
    protected function type(): string
    {
        return Type::class;
    }
}