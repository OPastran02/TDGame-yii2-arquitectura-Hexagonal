<?php

declare(strict_types=1);

namespace api\Shared\Domain\ValueObject;

use api\Shared\Domain\ValueObject\Primitives\StringValueObject;
use Error;

final class GameText extends StringValueObject
{
    public function __construct(string $value)
    {
        parent::__construct($value);
        $this->ensureIsValidJSON($value);
        $this->value = $value;
    }

    private function ensureIsValidJSON(string $value): void
    {
        $decoded = json_decode($value);
        if ($decoded === null && json_last_error() !== JSON_ERROR_NONE) {
            throw new \InvalidArgumentException("'$value' no es un JSON válido.");
        }
        foreach ($decoded as $item) {
            if (!is_object($item) || !property_exists($item, 'id') || !property_exists($item, 'text')) {
                throw new \InvalidArgumentException("Cada elemento del JSON debe ser un objeto con propiedades 'id' y 'text'.");
            }
        }
    }
    
    public function value(): string
    {
        return $this->value;
    }
}