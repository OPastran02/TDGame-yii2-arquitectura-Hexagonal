<?php

declare(strict_types=1);

namespace api\Core\Monster\Monster\Domain;

use api\Shared\Domain\ValueObject\{
    NID,
    UUID,
    Available
};
use api\Core\General\Object\Domain\Objeto; 
use api\Core\General\Stat\Domain\Stat; 

final class Monster
{
    public function __construct(
        private NID $id,
        private UUID $idObject, 
        private UUID $stats, 
        private Available $available,
        private Objeto $objeto,
        private Stat $stat
    )
    {
    }

    public static function create( 
        NID $id,
        UUID $idObject,
        UUID $stats, 
        Available $available,
        Objeto $objeto,
        Stat $stat
    ): self 
    {
        return new self(
            $id,
            $idObject,
            $stats,
            $available,
            $objeto,
            $stat
        );
    }

    public static function fromPrimitives(
        int $id,
        string $idObject,
        string $stats,
        int $available,
        Objeto $objeto,
        Stat $stat
    ): self
    {
        return new self(
            new NID($id),
            new UUID($idObject),
            new UUID($stats),
            new Available($available),
            $objeto,
            $stat
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          $this->id->value(),
            'idObject'              =>          $this->idObject->value(),
            'stats'                 =>          $this->stats->value(),
            'available'             =>          $this->available->value(),
            'objeto'                =>          $this->objeto->toPrimitives(),
            'stat'                  =>          $this->stat->toPrimitives(),
        ];
    }
}