<?php

declare(strict_types=1);

namespace api\Shared\Domain\ValueObject\Primitives;

abstract class IntValueObject
{
    public function __construct(private int $value)
    {
    }

    public function value(): int
    {
        return $this->value;
    }

    public function equals(self $other): bool
    {
        return $this->value() === $other->value();
    }

    public function __toString(): string
    {
        return (string) $this->value();
    }

    public function greaterThan(self $other): bool
    {
        return $this->value() > $other->value();
    }

    public function lessThan(self $other): bool
    {
        return $this->value() < $other->value();
    }
}