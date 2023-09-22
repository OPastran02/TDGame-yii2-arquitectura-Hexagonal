<?php

declare(strict_types=1);

namespace api\Shared\Domain\ValueObject;

use api\Shared\Domain\ValueObject\Primitives\StringValueObject;
use Error;

final class GameText extends StringValueObject
{
    protected string $value;

    public function __construct(string $value)
    {
        parent::__construct($value);
        $this->ensureIsValidJSON($value);
        $this->value = $value;
    }

    private function ensureIsValidJSON(string $value): void
    {
        // Intenta decodificar la cadena JSON como un array de objetos JSON
        $decoded = json_decode($value);

        // Verifica si la decodificación fue exitosa y es un array
        if ($decoded === null || !is_array($decoded)) {
            throw new \InvalidArgumentException("'$value' no es un JSON válido.");
        }

        // Verifica si cada elemento del array es un objeto JSON con propiedades 'id' y 'text'
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