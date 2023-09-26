<?php

declare(strict_types=1);

namespace api\Core\General\Rarity\Domain;

use api\Shared\Domain\ValueObject\NID;
use api\Shared\Domain\ValueObject\Available;
use api\Core\General\Object\Domain\Objeto; 

use api\Shared\Domain\Aggregate\AggregateRoot;

final class Rarity extends AggregateRoot
{
    private Objeto $objeto;

    public function __construct(
        private NID $id,
        private NID $idObject,
        private Available $available,
    )
    {
        $this->objeto = new Objeto();
    }

    public static function create( 
        NID $id,
        NID $idObject,
        Available $available
    ): self 
    {
        return new self(
            $id,
            $idObject,
            $available
        );
    }

    public static function fromPrimitives(
        ?int $id,
        int $idObject,
        int $available,
    ): self
    {
        return new self(
            isset($id) ? new NID($id):   null,
            new NID($idObject),
            new Available($available),
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          isset($this->id) ? $this->id->value() : null,
            'idObject'                =>        $this->idObject->value(), 
            'available'             =>          $this->available->value(),
        ];
    }
}