<?php

declare(strict_types=1);

namespace api\Core\General\Object\Domain\ValueObject;

use api\Shared\Domain\ValueObject\Primitives\StringValueObject;
use Error;

final class Color extends StringValueObject
{
    protected string $value;

    public function __construct(string $value)
    {
        parent::__construct($value);
        $this->ensureIsColor($value);
        $this->value = $value;
    }

    public function ensureIsColor(string $value): void
    {
        if (!preg_match('/^#([0-9A-Fa-f]{6}|[0-9A-Fa-f]{3})$/', $value)) {
            throw new \InvalidArgumentException("'$value' no es un código de color hexadecimal válido.");
        }
    }

    public function value(): string
    {
        return $this->value;
    }
}