<?php

declare(strict_types=1);

namespace api\Core\General\Land\Domain\ValueObject;

use api\Shared\Domain\ValueObject\Primitives\StringValueObject;

final class GridMap extends StringValueObject
{
    protected string $value;
    protected int $gridSize=40;

    public function __construct(string $value)
    {
        parent::__construct($value);
        $this->ensureIsValidJSON($value);
        $this->value = $value;
    }

    private function ensureIsValidJSON(string $value): void
    {
        $decoded = json_decode($value, true); // Decodificar el JSON como un arreglo asociativo
        if ($decoded === null || !is_array($decoded)) {
            throw new \InvalidArgumentException("'$value' no es un JSON válido.");
        }
        
        if (!array_key_exists('grid', $decoded) || !is_array($decoded['grid'])) {
            throw new \InvalidArgumentException("El JSON debe tener una clave 'grid' que sea un arreglo.");
        }

        $grid = $decoded['grid'];
        $gridSize = count($grid);
        if ($gridSize !== $this->gridSize) {
            throw new \InvalidArgumentException("El tamaño de la cuadrícula debe ser $this->gridSize x $this->gridSize.");
        }

        foreach ($grid as $row) {
            if (!is_array($row) || count($row) !== $this->gridSize) {
                throw new \InvalidArgumentException("Cada fila de la cuadrícula debe tener un tamaño de $this->gridSize y contener solo números.");
            }
            foreach ($row as $cell) {
                if (!is_numeric($cell)) {
                    throw new \InvalidArgumentException("Cada celda de la cuadrícula debe ser un número.");
                }
            }
        }
    }
    
    public function value(): string
    {
        return $this->value;
    }
}
