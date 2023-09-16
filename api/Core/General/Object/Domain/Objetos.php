<?php

declare(strict_types=1);

namespace api\Core\General\Object\Domain;

use api\Shared\Domain\Collection;

final class Objetos extends Collection
{
    protected function type(): string
    {
        return Objeto::class;
    }
}