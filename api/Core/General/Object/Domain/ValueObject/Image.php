<?php

declare(strict_types=1);

namespace api\Core\General\Object\Domain\ValueObject;

use api\Shared\Domain\ValueObject\Primitives\StringValueObject;
use InvalidArgumentException;

final class Image extends StringValueObject
{
    protected string $value;

    private const VALID_OPTIONS = ['LAND', 'HERO', 'BOXX', 'RAID', 'BADG', 'COIN', 'GUIL','PLAY'];

    public function __construct(string $value)
    {
        parent::__construct($value);
        $this->ensureTheCodeIsOk($value);
        $this->value = $value;
    }

    public function ensureTheCodeIsOk(string $value): void
    {
        $parts = explode('-', $value);
        if (count($parts) !== 4) {
            throw new InvalidArgumentException("'$value' no es un código válido.");
        }

        if ($parts[0] !== 'IMG') {
            throw new InvalidArgumentException("'$value' debe comenzar con 'IMG'.");
        }

        if (!in_array($parts[1], self::VALID_OPTIONS)) {
            
            throw new InvalidArgumentException("La tercera parte de '$value' no es válida.");
        }

        if (!ctype_digit($parts[2]) || !ctype_digit($parts[3])) {
            throw new InvalidArgumentException("Las partes 2 y 4 de '$value' deben ser numéricas.");
        }
    }

    public function value(): string
    {
        return $this->value;
    }

}