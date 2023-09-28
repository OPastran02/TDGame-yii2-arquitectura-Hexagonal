<?php

declare(strict_types=1);

namespace api\Shared\Domain\ValueObject\Primitives;
use JsonSerializable;


abstract class StringValueObject implements JsonSerializable
{
    public function __construct(protected string $value)
    {}

    public function value(): string
    {
        return $this->value;
    }

    public function equals(self $other): bool
    {
        return $this->value() === $other->value();
    }

    public function jsonSerialize(): mixed
    {
        return $this->value();
    }

}