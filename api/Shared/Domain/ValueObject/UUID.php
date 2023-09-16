<?php

declare(strict_types=1);

namespace api\Shared\Domain\ValueObject;

use invalidArgumentException;
use Ramsey\Uuid\Uuid as RamseyUuid;
use Stringable;

//clase final que toma un string y lo convierte en un UUID
class UUID implements Stringable
{
    public function __construct(private string $value)
    {
        $this->ensureIsValidUuid($value);
    }

    public static function random(): self
    {
        return new self(RamseyUuid::uuid4()->toString());
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equals(self $other): bool
    {
        return $this->value() === $other->value();
    }

    public function __toString(): string
    {
        return $this->value();
    }

    private function ensureisValidUuid(string $id): void
    {
        if (!RamseyUuid::isValid($id)) {
            throw new InvalidArgumentException(
                sprintf('<%s> does not allow the value <%s>.', static::class, $id)
            );
        }
    }
}