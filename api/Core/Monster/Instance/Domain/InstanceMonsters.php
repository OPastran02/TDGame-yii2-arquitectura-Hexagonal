<?php

declare(strict_types=1);

namespace api\Core\Monster\Instance\Domain;

use api\Shared\Domain\Collection;

final class InstanceMonsters extends Collection
{
    protected function type(): string
    {
        return InstanceMonster::class;
    }
}