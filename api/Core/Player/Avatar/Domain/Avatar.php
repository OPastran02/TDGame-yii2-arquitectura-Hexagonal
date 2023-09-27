<?php

declare(strict_types=1);

namespace api\Core\Player\Avatar\Domain;

use api\Shared\Domain\ValueObject\NID;
use api\Shared\Domain\ValueObject\UUID;
use api\Shared\Domain\ValueObject\Available;
use api\Core\General\Object\Domain\Objeto; 

use api\Shared\Domain\Aggregate\AggregateRoot;

final class Avatar extends AggregateRoot
{
    public function __construct(
        private UUID $id,
        private NID $idObject, 
        private Available $available,
        private Objeto $objeto
    )
    {
    }

    public static function create( 
        UUID $id,
        NID $idObject, 
        Available $available,
        Objeto $objeto,
    ): self 
    {
        return new self(
            $id,
            $idObject, 
            $available,
            $objeto,
        );
    }

    public static function fromPrimitives(
        ?string $id,
        int $idObject, 
        int $available,
        Objeto $objeto,
    ): self
    {
        return new self(
            isset($id) ? new UUID($id):   null,
            new NID ($idObject), 
            new Available ($available),
            $objeto,
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          isset($this->id) ? $this->id->value() : null,
            'idObject'              =>          $this->idObject->value(),
            'available'             =>          $this->available->value(),
            'objeto'                =>          $this->objeto->toPrimitives(),
        ];
    }
}