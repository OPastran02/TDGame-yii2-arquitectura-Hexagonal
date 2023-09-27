<?php

declare(strict_types=1);

namespace api\Core\Hero\Ability\Domain\ValueObject;

use api\Shared\Domain\ValueObject\Primitives\StringValueObject;
use Error;

final class BlockAttack extends StringValueObject
{
    protected string $value;

    public function __construct(string $value)
    {
        parent::__construct($value);
        $this->ensureValueIsBetweencolons($value);
        $this->value = $value;
    }

    private function ensureValueIsBetweencolons(string $value): void
    {
        if (!preg_match('/^(\d{1,3}-)+\d{1,3}$/', $value)) {
            throw new \InvalidArgumentException('El formato de BlockAttack no es válido.');
        }

        $numbers = explode('-', $value);

        foreach ($numbers as $number) {
            $intNumber = (int)$number;
            if ($intNumber < 1 || $intNumber > 120) {
                throw new \InvalidArgumentException('El valor de BlockAttack está fuera del rango permitido (1-120).');
            }
        }
    }

    public function value(): string
    {
        return $this->value;
    }

}