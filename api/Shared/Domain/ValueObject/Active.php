<?php

declare(strict_types=1);

namespace api\Shared\Domain\ValueObject;

use api\Shared\Domain\ValueObject\Primitives\IntValueObject;

final class Active extends IntValueObject
{
    const TRUE_VALUE = 1;
    const FALSE_VALUE = 0;

    protected int $value;

    public function __construct(int $value)
    {
        parent::__construct($value);

        if ($value !== self::TRUE_VALUE && $value !== self::FALSE_VALUE) {
            throw new \InvalidArgumentException('Invalid boolean value.');
        }

        $this->value = $value;
    }

    public static function true(): self
    {
        return new self(self::TRUE_VALUE);
    }

    public static function false(): self
    {
        return new self(self::FALSE_VALUE);
    }

    public function isTrue(): bool
    {
        return $this->value === self::TRUE_VALUE;
    }

    public function isFalse(): bool
    {
        return $this->value === self::FALSE_VALUE;
    }

    public function value(): int
    {
        return $this->value;
    }

}