<?php

declare(strict_types=1);

namespace api\Core\AvailableHeroes\Domain\ValueObjects;

use api\Shared\Domain\ValueObject\Primitives\IntValueObject;

final class AvailableHeroId extends IntValueObject
{
    public function __construct(int $value)
    {
        parent::__construct($value);
    }
}