<?php

declare(strict_types=1);

namespace api\Core\Chapter\Mob\Domain;

use api\Shared\Domain\ValueObject\{
    UUID,
    NID,
    Available
};
use api\Core\Chapter\Mob\Domain\ValueObject\{
    AmountOfKills,
    DamageDealt,
    IsKilled,
    Week
};
use api\Core\General\Object\Domain\Objeto;
use api\Core\General\Stat\Domain\Stat;

final class ChapterMob
{
    public function __construct(
        private NID $id, 
        private UUID $idObject, 
        private NID $idChapterLand, 
        private UUID $idStats,
        private Available $available,
        private Objeto $objeto,
        private Stat $stat
    )
    {
    }

    public static function create( 
        NID $id, 
        UUID $idObject, 
        NID $idChapterLand, 
        UUID $idStats,
        Available $available,
        Objeto $objeto,
        Stat $stat
    ): self 
    {
        return new self(
            $id, 
            $idObject, 
            $idChapterLand, 
            $idStats,
            $available,
            $objeto,
            $stat
        );
    }

    public static function fromPrimitives(
        int $id, 
        string $idObject, 
        int $idChapterLand, 
        string $idStats,
        int $available,
        Objeto $objeto,
        Stat $stat
    ): self
    {
        return new self(
            new NID($id), 
            new UUID($idObject), 
            new NID($idChapterLand), 
            new UUID($idStats),
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
            'idChapterLand'         =>          $this->idChapterLand->value(), 
            'idStats'               =>          $this->idStats->value(),
            'available'             =>          $this->available->value(),
            'objeto'                =>          $this->objeto->toPrimitives(),
            'stat'                  =>          $this->stat->toPrimitives(),
        ];
    }

}