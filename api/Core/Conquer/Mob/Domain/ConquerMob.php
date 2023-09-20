<?php

declare(strict_types=1);

namespace api\Core\Conquer\Mob\Domain;

use api\Shared\Domain\ValueObject\UUID;
use api\Shared\Domain\ValueObject\NID;
use api\Shared\Domain\ValueObject\Available;
use api\Core\Conquer\Mob\Domain\ValueObject\AmountOfKills;
use api\Core\Conquer\Mob\Domain\ValueObject\DamageDealt;
use api\Core\Conquer\Mob\Domain\ValueObject\IsKilled;
use api\Core\Conquer\Mob\Domain\ValueObject\Week;

use api\Shared\Domain\Aggregate\AggregateRoot;

final class ConquerMob extends AggregateRoot
{
    public function __construct(
        private NID $id, 
        private UUID $stats,
        private NID $idConquerLand, 
        private NID $idObject, 
        private Available $available,
    )
    {
    }

    public static function create( 
        NID $id, 
        UUID $stats,
        NID $idConquerLand, 
        NID $idObject, 
        Available $available,
    ): self 
    {
        return new self(
            $id, 
            $stats,
            $idConquerLand, 
            $idObject, 
            $available,
        );
    }

    public static function fromPrimitives(
        int $id, 
        string $stats,
        int $idConquerLand, 
        int $idObject, 
        int $available,
    ): self
    {
        return new Objeto(
            new NID($id), 
            new UUID($stats),
            new NID($idConquerLand), 
            new NID($idObject), 
            new Available($available),
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          isset($this->id) ? $this->id->value() : null,
            'id'                    =>          $this->id->value(), 
            'stats'                 =>          $this->stats->value(),
            'idConquerLand'         =>          $this->idConquerLand->value(), 
            'idObject'              =>          $this->idObject->value(), 
            'available'             =>          $this->available->value(),
        ];
    }

}