<?php

declare(strict_types=1);

namespace api\Shared\Domain\Bus\Event;

use api\shared\Domain\Utils;
use api\shared\Domain\ValueObject\UUID;
use DateTime;

abstract class DomainEvent
{
    private readonly ?string $eventId;
    private readonly ?string $occurredOn;
    
    public function __construct(
        private readonly int $aggregateId,
        string $eventId = null,
        string $occurredOn = null
    ) {
        $this->eventId = $eventId ?: UUID::random()->value();
        $this->occurredOn = $occurredOn ?: Utils::dateToString(new DateTime());
    }

    //convierte los objetos en primitivos
    abstract public static function fromPrimitives(
        int $aggregateId,
        array $body,
        string $eventId,
        string $occurredOn
    ): self;

    abstract public static function eventName(): string;

    abstract public function toPrimitives(): array;

    public function aggregateId(): int
    {
        return $this->aggregateId;
    }

    public function eventId(): string
    {
        return $this->eventId;
    }

    public function occurredOn(): string
    {
        return $this->occurredOn;
    }
}