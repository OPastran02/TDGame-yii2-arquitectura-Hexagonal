<?php

declare(strict_types=1);

namespace api\Core\General\Object\Domain;

use api\Shared\Domain\ValueObject\{
    NID,
    Available,
    UUID
};
use api\Core\Shared\Domain\ValueObject\{
    Bronze,
    Silver,
    Gold,
    Crystal
};
use api\Core\General\Reward\Domain\ValueObject\Quantity;
use api\Core\General\Object\Domain\Objeto; 

final class Reward 
{
    public function __construct(
        private NID $id,
        private UUID $idObject,
        private Bronze $bronze,
        private Silver $silver,
        private Gold $gold,
        private Crystal $crystal,
        private Quantity $quantity,
        private Available $available,
        private Objeto $objeto,
    )
    {
    }

    public static function create( 
        NID $id,
        UUID $idObject,
        Bronze $bronze,
        Silver $silver,
        Gold $gold,
        Crystal $crystal,
        Quantity $quantity,
        Available $available,
        Objeto $objeto
    ): self 
    {
        return $obj = new self(
            $id,
            $idObject,
            $bronze,
            $silver,
            $gold,
            $crystal,
            $quantity,
            $available,
            $objeto
        );
    }

    public static function fromPrimitives(
        int $id,
        string $idObject,
        int $bronze,
        int $silver,
        int $gold,
        int $crystal,
        int $quantity,
        int $available,
        Objeto $objeto
    ): self
    {
        return new Objeto(
            new NID($id),
            new UUID($idObject),
            new Bronze($bronze),
            new Silver($silver),
            new Gold($gold),
            new Crystal($crystal),
            new Quantity($quantity),
            new Available($available),
            $objeto
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          $this->id->value(),
            'idObject'              =>          $this->idObject->value(),
            'bronze'                =>          $this->bronze->value(),
            'silver'                =>          $this->silver->value(),
            'gold'                  =>          $this->gold->value(),
            'crystal'               =>          $this->crystal->value(),
            'quantity'              =>          $this->quantity->value(),
            'available'             =>          $this->available->value(),
            'objeto'                =>          $this->objeto->toPrimitives()
        ];
    }
}