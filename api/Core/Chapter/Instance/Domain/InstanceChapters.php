<?php

declare(strict_types=1);

namespace api\Core\Chapter\Instance\Domain;

use api\Shared\Domain\Collection;

final class InstanceChapters extends Collection
{
    protected function type(): string
    {
        return InstanceChapter::class;
    }
}