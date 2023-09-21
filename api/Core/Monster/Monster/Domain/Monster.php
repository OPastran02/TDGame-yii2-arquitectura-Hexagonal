<?php

declare(strict_types=1);

namespace api\Core\Monster\Monster\Domain;

use api\Shared\Domain\ValueObject\NID;
use api\Shared\Domain\ValueObject\UUID;
use api\Shared\Domain\ValueObject\Available;

use api\Shared\Domain\Aggregate\AggregateRoot;

final class Monster extends AggregateRoot
{
    public function __construct(
        private NID $id,
        private NID $idObject, 
        private UUID $stats, 
        private Available $available,
    )
    {
    }

    public static function create( 
        NID $id,
        NID $idObject,
        UUID $stats, 
        Available $available
    ): self 
    {
        return new self(
            $id,
            $idObject,
            $stats,
            $available
        );
    }

    public static function fromPrimitives(
        ?int $id,
        int $idObject,
        string $stats,
        int $available,
    ): self
    {
        return new Objeto(
            isset($id) ? new NID($id):   null,
            new NID($idObject),
            new UUID($stats),
            new Available($available),
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          isset($this->id) ? $this->id->value() : null,
            'idObject'              =>          $this->idObject->value(),
            'stats'                 =>          $this->stats->value(),
            'available'             =>          $this->available->value(),
        ];
    }

    public function getObjeto(): Objeto
    {
        return $this->objetoRepository->findObjetoById($this->idObject);
    }
}