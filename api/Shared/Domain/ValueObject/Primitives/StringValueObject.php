<?php

declare(strict_types=1);

namespace api\Shared\Domain\ValueObject\Primitives;

//clase abstracta que toma un string y lo convierte en un valor 
abstract class StringValueObject
{
    public function __construct(protected string $value)
    {
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equals(self $other): bool
    {
        return $this->value() === $other->value();
    }

}