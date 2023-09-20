<?php

declare(strict_types=1);

namespace api\Core\Conquer\Land\Domain;

use api\Shared\Domain\ValueObject\UUID;
use api\Shared\Domain\ValueObject\NID;
use api\Shared\Domain\ValueObject\Available;
use api\Core\Conquer\Land\Domain\ValueObject\AmountOfKills;
use api\Core\Conquer\Land\Domain\ValueObject\DamageDealt;
use api\Core\Conquer\Land\Domain\ValueObject\IsKilled;
use api\Core\Conquer\Land\Domain\ValueObject\Week;

use api\Shared\Domain\Aggregate\AggregateRoot;

final class ConquerLand extends AggregateRoot
{
    public function __construct(
        private UUID $idGuild,
        private NID $idWorld, 
        private UUID $idland, 
        private Available $available,
    )
    {
    }

    public static function create( 
        UUID $idGuild,
        NID $idWorld, 
        UUID $idland, 
        Available $available,
    ): self 
    {
        return new self(
            $idGuild,
            $idWorld, 
            $idland, 
            $available,
        );
    }

    public static function fromPrimitives(
        $idGuild,
        $idWorld, 
        $idland, 
        $available,
    ): self
    {
        return new Objeto(
            isset($id) ? new UUID($idGuild):   null,
            new NID($idConquer), 
            new NID($idWorld), 
            new UUID($idland), 
            new Available($available),
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          isset($this->id) ? $this->id->value() : null,
            'idConquer'             =>          $this->idConquer->value(), 
            'damageDealt'           =>          $this->damageDealt->value(), 
            'active'                =>          $this->active->value(), 
            'week'                  =>          $this->week->value(), 
            'isKilled'              =>          $this->isKilled->value(), 
            'amountOfKills'         =>          $this->amountOfKills->value(), 
            'available'             =>          $this->available->value(),
        ];
    }

}