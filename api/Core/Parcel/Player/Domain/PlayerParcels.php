<?php

declare(strict_types=1);

namespace api\Core\Parcel\Parcel\Domain;

use api\Shared\Domain\Collection;

final class Parcels extends Collection
{
    protected function type(): string
    {
        return Parcel::class;
    }
}