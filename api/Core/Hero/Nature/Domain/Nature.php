<?php

declare(strict_types=1);

namespace api\Core\Hero\Nature\Domain;

use api\Shared\Domain\ValueObject\{
    NID,
    Available,
    GameText
};
use api\Core\General\Object\Domain\Objeto; 
use api\Core\Hero\Boost\Domain\Boost; 

final class Nature
{
    public function __construct(
        private NID $id,
        private NID $idObject, 
        private NID $idBoost, 
        private Available $available,
        private Objeto $objeto,
        private Boost $boost
    )
    {
    }

    public static function create( 
        NID $id,
        NID $idObject, 
        NID $idBoost, 
        Available $available,
        Objeto $objeto,
        Boost $boost
    ): self 
    {
        return new self(
            $id,
            $idObject, 
            $idBoost, 
            $available,
            $objeto,
            $boost
        );
    }

    public static function fromPrimitives(
        int $id,
        int $idObject, 
        int $idBoost, 
        int $available,
        Objeto $objeto,
        Boost $boost
    ): self
    {
        return new self(
            new NID($id),
            new NID ($idObject), 
            new NID ($idBoost), 
            new Available ($available),
            $objeto,
            $boost
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          isset($this->id) ? $this->id->value() : null,
            'idObject'              =>          $this->idObject->value(),
            'idBoost'               =>          $this->idBoost->value(), 
            'available'             =>          $this->available->value(),
            'objeto'                =>          $this->objeto->toPrimitives(),
            'boost'                 =>          $this->boost->toPrimitives(),
        ];
    }
}