<?php

declare(strict_types=1);

namespace api\Core\General\Shop\Domain;

use api\Shared\Domain\ValueObject\NID;
use api\Shared\Domain\ValueObject\Available;

use api\Shared\Domain\Aggregate\AggregateRoot;

final class Shop extends AggregateRoot
{
    public function __construct(
        private NID $id,
        private NID $idObject, 
        private Available $available,
    )
    {
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
        return new Objeto(
            isset($id) ? new NID($id):   null,
            new NID($idObject),
            new Available($available),
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          isset($this->id) ? $this->id->value() : null,
            'idObject'              =>          $this->idObject->value(),
            'available'             =>          $this->available->value(),
        ];
    }

}