<?php

declare(strict_types=1);

namespace api\Core\Shared\Domain\ValueObject;

use api\Shared\Domain\ValueObject\Primitives\IntValueObject;

final class Increment extends IntValueObject
{

    protected int $value;

    private const MIN_VALUE = 1;
    private const MAX_VALUE = 50;    

    public function __construct( int $value)
    {
        parent::__construct($value);
        $this->ensureIsBetweenAcceptedValues($value);
        $this->value = $value;
    }

    public function ensureIsBetweenAcceptedValues(int $value): void
    {
        if ($value < self::MIN_VALUE || $value > self::MAX_VALUE) {
            throw new DomainException(
                sprintf(
                    'The value (%s) must be between %s and %s',
                    $value,
                    self::MIN_VALUE,
                    self::MAX_VALUE
                )
            );
        }
    }

    public function value(): int
    {
        return $this->value;
    }
}