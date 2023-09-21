<?php

declare(strict_types=1);

namespace api\Core\General\Requirement\Domain;

use api\Shared\Domain\Collection;

final class Requirements extends Collection
{
    protected function type(): string
    {
        return Requirement::class;
    }
}