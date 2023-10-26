<?php

declare(strict_types=1);

namespace api\Core\General\Prototype\Domain;

use api\Shared\Domain\ValueObject\{
    UUID,
    Available,
    NID
};

final class Prototype
{
    public function __construct(
        private UUID $id,
        private NID $rarity,
        private NID $type,
        private NID $race,
        private UUID $object,
        private Available $available,
    )
    {}

    public static function create( 
        UUID $id,
        NID $rarity,
        NID $type,
        NID $race,
        UUID $object,
        Available $available,
    ): self 
    {
        return new self(
            $id,
            $rarity,
            $type,
            $race,
            $object,
            $available,
        );
    }

    public static function fromPrimitives(
        string $id,
        int $rarity,
        int $type,
        int $race,
        string $object,
        int $available,
    ): self
    {
        return new self(
            new UUID($id),
            new NID($rarity),
            new NID($type),
            new NID($race),
            new UUID($object),
            new Available($available),
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          $this->id->value(),
            'rarity'                =>          $this->rarity->value(),
            'type'                  =>          $this->type->value(),
            'race'                  =>          $this->race->value(),
            'object'                =>          $this->object->value(),
            'available'             =>          $this->available->value(),
        ];
    }

    public function id(): UUID
    {
        return $this->id;
    }

}