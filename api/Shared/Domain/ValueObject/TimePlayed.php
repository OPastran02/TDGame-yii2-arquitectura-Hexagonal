<?php

declare(strict_types=1);

namespace api\Shared\Domain\ValueObject;

use api\Shared\Domain\ValueObject\Primitives\IntValueObject;

final class TimePlayed extends IntValueObject
{
    protected int $value;

    public function __construct(int $seconds)
    {
        parent::__construct($seconds);
        $this->value = $seconds;
    }

    public function toFormattedString(): string
    {
        $days = floor($this->value / 86400);
        $remainder = $this->value % 86400;
        $hours = floor($remainder / 3600);
        $remainder = $remainder % 3600;
        $minutes = floor($remainder / 60);
        $seconds = $remainder % 60;

        return sprintf('%02d:%02d:%02d:%02d', $days, $hours, $minutes, $seconds);
    }
}