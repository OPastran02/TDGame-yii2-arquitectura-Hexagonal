<?php

declare(strict_types=1);

namespace api\Core\Rank\Rank\Domain;

use api\Shared\Domain\ValueObject\{
    NID,
    UUID,
    Available
};
use api\Core\General\Object\Domain\Objeto; 

final class Rank
{
    public function __construct(
        private NID $id,
        private NID $idObject, 
        private Available $available,
        private Objeto $objeto,
    )
    {}

    public static function create( 
        NID $id,
        NID $idObject, 
        Available $available,
        Objeto $objeto,
    ): self 
    {
        return new self(
            $id,
            $idObject, 
            $available,
            $objeto,
        );
    }

    public static function fromPrimitives(
        ?int $id,
        int $idObject, 
        int $available,
        Objeto $objeto,
    ): self
    {
        return new self(
            isset($id) ? new NID($id):   null,
            new NID ($idObject), 
            new Available ($available),
            $objeto,
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          isset($this->id) ? $this->id->value() : null,
            'idObject'              =>          $this->idObject->value(),
            'available'             =>          $this->available->value(),
            'objeto'                =>          $this->objeto->toPrimitives(),
        ];
    }
}