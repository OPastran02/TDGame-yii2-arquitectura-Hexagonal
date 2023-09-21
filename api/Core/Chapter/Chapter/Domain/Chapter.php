<?php

declare(strict_types=1);

namespace api\Core\Chapter\Chapter\Domain;

use api\Shared\Domain\ValueObject\NID;
use api\Shared\Domain\ValueObject\UUID;
use api\Shared\Domain\ValueObject\Available;

use api\Shared\Domain\Aggregate\AggregateRoot;

final class Chapter extends AggregateRoot
{
    public function __construct(
        private NID $id,
        private NID $idObject, 
        private NID $idReward, 
        private Available $available,
    )
    {
    }

    public static function create( 
        NID $id,
        NID $idObject,
        NID $idReward, 
        Available $available
    ): self 
    {
        return new self(
            $id,
            $idObject,
            $idReward,
            $available
        );
    }

    public static function fromPrimitives(
        ?int $id,
        int $idObject,
        int $idReward,
        int $available,
    ): self
    {
        return new Objeto(
            isset($id) ? new NID($id):   null,
            new NID($idObject),
            new NID($idReward),
            new Available($available),
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          isset($this->id) ? $this->id->value() : null,
            'idObject'              =>          $this->idObject->value(),
            'idReward'              =>          $this->idReward->value(),
            'available'             =>          $this->available->value(),
        ];
    }

}