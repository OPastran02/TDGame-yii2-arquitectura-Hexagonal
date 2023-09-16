<?php

declare(strict_types=1);

namespace App\Shared\Domain;

use DomainException;

//clase final que toma dos Seconds y genera un intervalo de tiempo
final class SecondsInterval
{
    public function __construct(private Seconds $start, private Seconds $end)
    {
        $this->ensureStartIsLessThanEnd();
    }

    public static function fromValues(int $start, int $end): self
    {
        return new self(new Seconds($start), new Seconds($end));
    }

    private function ensureStartIsLessThanEnd(): void
    {
        if ($this->start->value() >= $this->end->value()) {
            throw new DomainException(
                sprintf(
                    'The start value (%s) must be less than the end value (%s)',
                    $this->start->value(),
                    $this->end->value()
                )
            );
        }
    }
}