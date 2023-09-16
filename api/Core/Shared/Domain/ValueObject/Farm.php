<?php

declare(strict_types=1);

namespace api\Core\Shared\Domain\ValueObject;

use api\Shared\Domain\ValueObject\Primitives\StringValueObject;

final class Farm extends StringValueObject
{

    protected string $value;

    private const MIN_LENGTH = 1;
    private const MAX_LENGTH = 50;

    public function __construct(string $value)
    {
        parent::__construct($value);
        $this->ensureIsValidName($value);
        $this->ensureIsLengthBetween($value);
        $this->value = $value;
    }

    private function ensureIsValidName(string $value): void
    {
        if (empty($value)) {
            throw new \InvalidArgumentException(
                sprintf('<%s> does not allow the value <%s>.', static::class, $value)
            );
        }
    }

    private function ensureIsLengthBetween(string $value): void
    {
        if (strlen($value) < self::MIN_LENGTH || strlen($value) > self::MAX_LENGTH) {
            throw new \InvalidArgumentException(
                sprintf(
                    '<%s> does not allow the value <%s>. It must be between <%s> and <%s> characters long.',
                    static::class,
                    $value,
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