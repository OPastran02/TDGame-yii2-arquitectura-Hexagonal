<?php

declare(strict_types=1);

namespace api\Core\Hero\Type\Domain;

use api\Shared\Domain\ValueObject\{
    UUID,
    NID,
    Available,
    GameText
};
use api\Core\General\Object\Domain\Objeto; 
use api\Core\Hero\Boost\Domain\Boost; 
/*Tipo de heroe*/
final class Type
{
    public function __construct(
        private NID $id,
        private UUID $idObject, 
        private String $horoscope, 
        private NID $idBoost, 
        private Available $available,
        private Objeto $objeto,
        private Boost $boost
    )
    {
    }

    public static function create( 
        NID $id,
        UUID $idObject, 
        String $horoscope, 
        NID $idBoost, 
        Available $available,
        Objeto $objeto,
        Boost $boost
    ): self 
    {
        return new self(
            $id,
            $idObject, 
            $horoscope, 
            $idBoost, 
            $available,
            $objeto,
            $boost
        );
    }

    public static function fromPrimitives(
        int $id,
        String $idObject, 
        String $horoscope, 
        int $idBoost, 
        int $available,
        Objeto $objeto,
        Boost $boost
    ): self
    {
        return new self(
            new NID($id),
            new UUID ($idObject), 
            $horoscope, 
            new NID ($idBoost), 
            new Available ($available),
            $objeto,
            $boost
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          $this->id->value(),
            'idObject'              =>          $this->idObject->value(),
            'horoscope'             =>          $this->horoscope, 
            'idBoost'               =>          $this->idBoost->value(), 
            'available'             =>          $this->available->value(),
            'objeto'                =>          $this->objeto->toPrimitives(),
            'boost'                 =>          $this->boost->toPrimitives(),
        ];
    }

}