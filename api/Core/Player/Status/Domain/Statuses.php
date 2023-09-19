<?php

declare(strict_types=1);

namespace api\Core\Player\Status\Domain;

use api\Shared\Domain\Collection;

final class Statuses extends Collection
{
    protected function type(): string
    {
        return Status::class;
    }
}