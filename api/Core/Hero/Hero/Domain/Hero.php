<?php

declare(strict_types=1);

namespace api\Core\Hero\Hero\Domain;

use api\Shared\Domain\ValueObject\NID;
use api\Shared\Domain\ValueObject\UUID;
use api\Shared\Domain\ValueObject\Available;
use api\Core\Hero\Hero\Domain\ValueObject\IsLanded;
use api\Core\Shared\Domain\ValueObject\Bronze;
use api\Core\Shared\Domain\ValueObject\Silver;
use api\Core\Shared\Domain\ValueObject\Gold;
use api\Core\Shared\Domain\ValueObject\Experience;
use api\Core\Shared\Domain\ValueObject\Level;

use api\Shared\Domain\Aggregate\AggregateRoot;

final class Hero extends AggregateRoot
{
    public function __construct(
        NID $id,
        UUID $idPlayer,
        NID $idObject,
        NID $rarity,
        NID $nature,
        NID $type,
        NID $race,
        NID $abilities,
        UUID $stats,
        Experience $experience,
        Level $level,
        IsLanded $isLanded,
        UUID $land,
        Available $available,
    )  
    {
    }

    public static function create( 
        NID $id,
        UUID $idPlayer,
        NID $idObject,
        NID $rarity,
        NID $nature,
        NID $type,
        NID $race,
        NID $abilities,
        UUID $stats,
        Experience $experience,
        Level $level,
        IsLanded $isLanded,
        UUID $land,
        Available $available,
    ): self 
    {
        return new self(
            $id,
            $idPlayer,
            $idObject,
            $rarity,
            $nature,
            $type,
            $race,
            $abilities,
            $stats,
            $experience,
            $level,
            $isLanded,
            $land,
            $available,
        );
    }

    public static function fromPrimitives(
        string $id,
        string $idPlayer,
        int $idObject,
        int $rarity,
        int $nature,
        int $type,
        int $race,
        int $abilities,
        string $stats,
        int $experience,
        int $level,
        int $isLanded,
        string $land,
        int $available,
    ): self
    {
        return new Objeto(
            new NID($id),
            new UUID($idPlayer),
            new NID($idObject),
            new NID($rarity),
            new NID($nature),
            new NID($type),
            new NID($race),
            new NID($abilities),
            new UUID($stats),
            new Experience($experience),
            new Level($level),
            new IsLanded($isLanded),
            new UUID($land),
            new Available($available),
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          $this->id->value(),
            'idPlayer'              =>          $this->idPlayer->value(),
            'idObject'              =>          $this->idObject->value(),
            'rarity'                =>          $this->rarity->value(),
            'nature'                =>          $this->nature->value(),
            'type'                  =>          $this->type->value(),
            'race'                  =>          $this->race->value(),
            'abilities'             =>          $this->abilities->value(),
            'stats'                 =>          $this->stats->value(),
            'experience'            =>          $this->experience->value(),
            'level'                 =>          $this->level->value(),
            'isLanded'              =>          $this->isLanded->value(),
            'land'                  =>          $this->land->value(),
            'available'             =>          $this->available->value(),
        ];
    }

}