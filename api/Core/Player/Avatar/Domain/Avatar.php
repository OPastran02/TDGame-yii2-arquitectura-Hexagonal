<?php

declare(strict_types=1);

namespace api\Core\Player\Avatar\Domain;

use api\Shared\Domain\ValueObject\NID;
use api\Shared\Domain\ValueObject\UUID;
use api\Shared\Domain\ValueObject\Available;

use api\Shared\Domain\Aggregate\AggregateRoot;

final class Avatar extends AggregateRoot
{
    public function __construct(
        private UUID $id,
        private NID $idObject, 
        private Available $available,
    )
    {
    }

    public static function create( 
        UUID $id,
        NID $idObject, 
        Available $available,
    ): self 
    {
        return new self(
            $id,
            $idObject, 
            $available,
        );
    }

    public static function fromPrimitives(
        ?int $id,
        int $idObject, 
        int $available,
    ): self
    {
        return new Objeto(
            isset($id) ? new UUID($id):   null,
            new NID ($idObject), 
            new Available ($available),
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