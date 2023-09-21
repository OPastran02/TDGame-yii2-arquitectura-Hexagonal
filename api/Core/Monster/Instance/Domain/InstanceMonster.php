<?php

declare(strict_types=1);

namespace api\Core\Monster\Instance\Domain;

use api\Shared\Domain\ValueObject\UUID;
use api\Shared\Domain\ValueObject\NID;
use api\Shared\Domain\ValueObject\Available;
use api\Core\Monster\Instance\Domain\ValueObject\AmountOfKills;
use api\Core\Monster\Instance\Domain\ValueObject\DamageDealt;
use api\Core\Monster\Instance\Domain\ValueObject\IsKilled;
use api\Core\Monster\Instance\Domain\ValueObject\Week;

use api\Shared\Domain\Aggregate\AggregateRoot;

final class InstanceMonster extends AggregateRoot
{
    public function __construct(
        private NID $id,
        private UUID $idGuild,
        private NID $idMonster, 
        private DamageDealt $damageDealt, 
        private Available $active, 
        private Week $week, 
        private IsKilled $isKilled, 
        private AmountOfKills $amountOfKills, 
        private Available $available,
    )
    {
    }

    public static function create( 
        NID $id,
        UUID $idGuild,
        NID $idMonster, 
        DamageDealt $damageDealt, 
        Available $active, 
        Week $week, 
        IsKilled $isKilled, 
        AmountOfKills $amountOfKills, 
        Available $available,
    ): self 
    {
        return new self(
            $id,
            $idGuild,
            $idMonster, 
            $damageDealt, 
            $active, 
            $week, 
            $isKilled, 
            $amountOfKills, 
            $available,
        );
    }

    public static function fromPrimitives(
        $id,
        $idGuild,
        $idMonster, 
        $damageDealt, 
        $active, 
        $week, 
        $isKilled, 
        $amountOfKills, 
        $available,
    ): self
    {
        return new Objeto(
            isset($id) ? new UUID($id):   null,
            new UUID($idGuild),
            new NID($idMonster), 
            new DamageDealt($damageDealt), 
            new Available($active), 
            new Week($week), 
            new IsKilled($isKilled), 
            new AmountOfKills($amountOfKills), 
            new Available($available),
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          isset($this->id) ? $this->id->value() : null,
            'idGuild'               =>          $this->idGuild->value(),
            'idMonster'             =>          $this->idMonster->value(), 
            'damageDealt'           =>          $this->damageDealt->value(), 
            'active'                =>          $this->active->value(), 
            'week'                  =>          $this->week->value(), 
            'isKilled'              =>          $this->isKilled->value(), 
            'amountOfKills'         =>          $this->amountOfKills->value(), 
            'available'             =>          $this->available->value(),
        ];
    }

}