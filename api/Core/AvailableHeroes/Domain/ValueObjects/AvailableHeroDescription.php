<?php

declare(strict_types=1);

namespace api\Core\AvailableHeroes\Domain\ValueObjects;

use api\Shared\Domain\ValueObject\Primitives\StringValueObject;
final class AvailableHeroDescription extends StringValueObject
{

    protected string $value;

    private const MIN_LENGTH = 1;
    private const MAX_LENGTH = 255;

    public function __construct(string $value)
    {
        parent::__construct($value);
        $this->ensureIsValidDescription($value);
        $this->ensureIsLengthBetweenAcceptedValues($value);
        $this->value = $value;
    }

    private function ensureIsValidDescription(string $value): void
    {
        if (empty($value)) {
            throw new \InvalidArgumentException(
                sprintf('<%s> does not allow the value <%s>.', static::class, $value)
            );
        }
    }

    private function ensureIsLengthBetweenAcceptedValues(string $value): void
    {
        if (strlen($value) < self::MIN_LENGTH || strlen($value) > self::MAX_LENGTH) {
            throw new \InvalidArgumentException(
                sprintf(
                    'The length of <%s> must be between <%s> and <%s>.',
                    static::class,
                    self::MIN_LENGTH,
                    self::MAX_LENGTH
                )
            );
        }
    }

    public function value(): string
    {
        return $this->value;
    }
}