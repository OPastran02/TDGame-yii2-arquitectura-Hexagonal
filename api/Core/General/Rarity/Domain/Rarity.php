<?php

declare(strict_types=1);

namespace api\Core\General\Rarity\Domain;

use api\Shared\Domain\ValueObject\{
    NID,
    Available
};



final class Rarity
{

    public function __construct(
        private NID $id,
        private NID $idObject,
        private Available $available,
        private Objeto $objeto
    )
    {
    }
    
    public static function create( 
        NID $id,
        NID $idObject,
        Available $available,
        Objeto $objeto 
    ): self 
    {
        return new self(
            $id,
            $idObject,
            $available,
            $objeto 
        );
    }

    public static function fromPrimitives(
        int $id,
        int $idObject,
        int $available,
        Objeto $objeto
    ): self
    {
        return new self(
            new NID($id),
            new NID($idObject),
            new Available($available),
            $objeto
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          $this->id->value(),
            'idObject'              =>          $this->idObject->value(), 
            'available'             =>          $this->available->value(),
            'objeto'                =>          $this->objeto->toPrimitives()
        ];
    }
}