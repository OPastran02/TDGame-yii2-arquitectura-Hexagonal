<?php

declare(strict_types=1);

namespace api\Core\Hero\Ability\Domain\ValueObject;

use api\Shared\Domain\ValueObject\Primitives\StringValueObject;
use Error;

final class BlockAttack extends StringValueObject
{
    protected string $value;

    public function __construct(string $value)
    {
        parent::__construct($value);
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

}