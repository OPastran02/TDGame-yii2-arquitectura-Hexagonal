<?php

declare(strict_types=1);

namespace api\Core\General\Object\Domain;

use api\Shared\Domain\ValueObject\NID;
use api\Shared\Domain\ValueObject\Available;
use api\Core\General\Reward\Domain\ValueObject\Quantity;
use api\Core\Shared\Domain\ValueObject\Bronze;
use api\Core\Shared\Domain\ValueObject\Silver;
use api\Core\Shared\Domain\ValueObject\Gold;
use api\Core\Shared\Domain\ValueObject\Crystal;

use api\Shared\Domain\Aggregate\AggregateRoot;

final class Reward extends AggregateRoot
{
    public function __construct(
        private NID $id,
        private NID $idObject,
        private Bronze $bronze,
        private Silver $silver,
        private Gold $gold,
        private Crystal $crystal,
        private Quantity $quantity,
        private Available $available,
    )
    {
    }

    public static function create( 
        NID $id,
        NID $idObject,
        Bronze $bronze,
        Silver $silver,
        Gold $gold,
        Crystal $crystal,
        Quantity $quantity,
        Available $available,
    ): self 
    {
        return $obj = new Objeto(
            $id,
            $idObject,
            $bronze,
            $silver,
            $gold,
            $crystal,
            $quantity,
            $available,
        );
    }

    public static function fromPrimitives(
        int $id,
        int $idObject,
        int $bronze,
        int $silver,
        int $gold,
        int $crystal,
        int $quantity,
        int $available,
    ): self
    {
        return new Objeto(
            new NID($id),
            new NID($idObject),
            new Bronze($bronze),
            new Silver($silver),
            new Gold($gold),
            new Crystal($crystal),
            new Quantity($quantity),
            new Available($available),
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
        ];
    }
}