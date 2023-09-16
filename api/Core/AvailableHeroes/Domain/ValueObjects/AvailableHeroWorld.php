<?php

declare(strict_types=1);

namespace api\Core\AvailableHeroes\Domain\ValueObjects;
use api\Shared\Domain\ValueObject\Primitives\StringValueObject;
final class AvailableHeroWorld extends StringValueObject
{
    protected string $value;

    private const MIN_LENGTH = 1;
    private const MAX_LENGTH = 255;
    public function __construct(string $value)
    {
        parent::__construct($value);
        $this->ensureIsValidName($value);
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

    public function value(): string
    {
        return $this->value;
    }
}