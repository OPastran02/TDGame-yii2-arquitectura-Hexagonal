<?php

declare(strict_types=1);

namespace api\Core\Player\Avatar\Domain\ValueObject;

use api\Shared\Domain\ValueObject\Primitives\StringValueObject;
use InvalidArgumentException;

final class Nickname extends StringValueObject
{
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