<?php

declare(strict_types=1);

namespace api\Core\Conquer\Conquer\Domain;

use api\Shared\Domain\ValueObject\UUID;
use api\Shared\Domain\ValueObject\NID;
use api\Shared\Domain\ValueObject\Available;

use api\Shared\Domain\Aggregate\AggregateRoot;

final class Conquer extends AggregateRoot
{
    public function __construct(
        private ?UUID $id,
        private NID $idObject, 
        private NID $idConquerWorlds, 
        private Available $available,
    )
    {
    }

    public static function create( 
        ?UUID $id,
        NID $idObject, 
        NID $idConquerWorlds,
        Available $available
    ): self 
    {
        return new self(
            $id,
            $idObject, 
            $idConquerWorlds,
            $available
        );
    }

    public static function fromPrimitives(
        ?int $id,
        int $idObject, 
        int $idConquerWorlds,
        int $available
    ): self
    {
        return new Objeto(
            isset($id) ? new UUID($id):   null,
            new NID($idObject), 
            new NID($idConquerWorlds),
            new Available($available),
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          isset($this->id) ? $this->id->value() : null,
            'idObject'              =>          $this->idObject->value(), 
            'idConquerWorlds'       =>          $this->idConquerWorlds->value(),
            'available'             =>          $this->available->value(),
        ];
    }

}