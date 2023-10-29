<?php

declare(strict_types=1);

namespace api\Core\General\Prototype\Domain;

use api\Shared\Domain\ValueObject\{
    UUID,
    Available,
    NID
};
use api\Core\General\Object\Domain\Objeto; 

final class Prototype
{
    public function __construct(
        private NID $id,
        private NID $rarity,
        private NID $nature,
        private NID $type,
        private NID $race,
        private UUID $idObject,
        private Available $available,
        private Objeto $objeto,
    )
    {}

    public static function create( 
        NID $id,
        NID $rarity,
        NID $nature,
        NID $type,
        NID $race,
        UUID $idObject,
        Available $available,
        Objeto $objeto,
    ): self 
    {
        return new self(
            $id,
            $rarity,
            $nature,
            $type,
            $race,
            $idObject,
            $available,
            $objeto,
        );
    }

    public static function fromPrimitives(
        int $id,
        int $rarity,
        int $nature,
        int $type,
        int $race,
        string $idObject,
        int $available,
        Objeto $objeto,
    ): self
    {
        return new self(
            new NID($id),
            new NID($rarity),
            new NID($nature),
            new NID($type),
            new NID($race),
            new UUID($idObject),
            new Available($available),
            $objeto
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          $this->id->value(),
            'rarity'                =>          $this->rarity->value(),
            'nature'                =>          $this->nature->value(),
            'type'                  =>          $this->type->value(),
            'race'                  =>          $this->race->value(),
            'idObject'              =>          $this->idObject->value(),
            'available'             =>          $this->available->value(),
            'objeto'                =>          $this->objeto->toPrimitives(),
        ];
    }

    public function id(): UUID
    {
        return $this->id;
    }

}