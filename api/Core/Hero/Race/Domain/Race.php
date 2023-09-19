<?php

declare(strict_types=1);

namespace api\Core\Hero\Race\Domain;

use api\Shared\Domain\ValueObject\NID;
use api\Shared\Domain\ValueObject\Available;
use api\Shared\Domain\ValueObject\GameText;

use api\Shared\Domain\Aggregate\AggregateRoot;

final class Race extends AggregateRoot
{
    public function __construct(
        private NID $id,
        private NID $idObject, 
        private NID $idBoost, 
        private Available $available,
    )
    {
    }

    public static function create( 
        NID $id,
        NID $idObject, 
        NID $idBoost, 
        Available $available,
    ): self 
    {
        return new self(
            $id,
            $idObject, 
            $idBoost, 
            $available,
        );
    }

    public static function fromPrimitives(
        ?int $id,
        int $idObject, 
        int $idBoost, 
        int $available,
    ): self
    {
        return new Objeto(
            isset($id) ? new NID($id):   null,
            new NID ($idObject), 
            new NID ($idBoost), 
            new Available ($available),
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          isset($this->id) ? $this->id->value() : null,
            'idObject'              =>          $this->idObject->value(),
            'idBoost'               =>          $this->idBoost->value(), 
            'available'             =>          $this->available->value(),
        ];
    }
}