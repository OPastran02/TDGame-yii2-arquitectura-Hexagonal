<?php

declare(strict_types=1);

namespace api\Core\General\Shop\Domain;

use api\Shared\Domain\Collection;

final class Rarities extends Collection
{
    protected function type(): string
    {
        return Shop::class;
    }
}