<?php

declare(strict_types=1);

namespace api\Core\Conquer\Instance\Domain;

use api\Shared\Domain\Collection;

final class InstanceConquers extends Collection
{
    protected function type(): string
    {
        return InstanceConquer::class;
    }
}