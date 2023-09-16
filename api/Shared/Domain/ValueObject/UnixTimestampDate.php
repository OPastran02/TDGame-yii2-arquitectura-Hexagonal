<?php

declare(strict_types=1);

namespace api\Shared\Domain\ValueObject;

use DateTime;
use api\Shared\Domain\ValueObject\Primitives\IntValueObject;

final class UnixTimestampDate extends IntValueObject
{
    protected int $value;

    public function __construct(int $timestamp)
    {
        parent::__construct($timestamp);
        $this->value = $timestamp;
    }

    public function toDateTime(): DateTime
    {
        return DateTime::createFromFormat('U', (string)$this->value);
    }

    public function format(string $format): string
    {
        $dateTime = $this->toDateTime();
        return $dateTime->format($format);
    }
}
