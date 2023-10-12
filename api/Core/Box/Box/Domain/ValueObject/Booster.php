<?php

declare(strict_types=1);

namespace api\Core\Box\Box\Domain\ValueObject;

use api\Shared\Domain\ValueObject\Primitives\StringValueObject;

final class Booster extends StringValueObject
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
