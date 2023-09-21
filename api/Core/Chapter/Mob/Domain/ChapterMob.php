<?php

declare(strict_types=1);

namespace api\Core\Chapter\Mob\Domain;

use api\Shared\Domain\ValueObject\UUID;
use api\Shared\Domain\ValueObject\NID;
use api\Shared\Domain\ValueObject\Available;
use api\Core\Chapter\Mob\Domain\ValueObject\AmountOfKills;
use api\Core\Chapter\Mob\Domain\ValueObject\DamageDealt;
use api\Core\Chapter\Mob\Domain\ValueObject\IsKilled;
use api\Core\Chapter\Mob\Domain\ValueObject\Week;

use api\Shared\Domain\Aggregate\AggregateRoot;

final class ChapterMob extends AggregateRoot
{
    public function __construct(
        private NID $id, 
        private NID $idObject, 
        private NID $idChapterLand, 
        private UUID $stats,
        private Available $available,
    )
    {
    }

    public static function create( 
        NID $id, 
        NID $idObject, 
        NID $idChapterLand, 
        UUID $stats,
        Available $available,
    ): self 
    {
        return new self(
            $id, 
            $idObject, 
            $idChapterLand, 
            $stats,
            $available,
        );
    }

    public static function fromPrimitives(
        int $id, 
        int $idObject, 
        int $idChapterLand, 
        string $stats,
        int $available,
    ): self
    {
        return new Objeto(
            new NID($id), 
            new NID($idObject), 
            new NID($idChapterLand), 
            new UUID($stats),
            new Available($available),
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          $this->id->value(), 
            'idObject'              =>          $this->idObject->value(), 
            'idChapterLand'         =>          $this->idChapterLand->value(), 
            'stats'                 =>          $this->stats->value(),
            'available'             =>          $this->available->value(),
        ];
    }

}