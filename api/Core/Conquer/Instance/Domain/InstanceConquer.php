<?php

declare(strict_types=1);

namespace api\Core\Conquer\Instance\Domain;

use api\Shared\Domain\ValueObject\UUID;
use api\Shared\Domain\ValueObject\NID;
use api\Shared\Domain\ValueObject\Available;
use api\Core\Conquer\Instance\Domain\ValueObject\AmountOfKills;
use api\Core\Conquer\Instance\Domain\ValueObject\DamageDealt;
use api\Core\Conquer\Instance\Domain\ValueObject\IsKilled;
use api\Core\Conquer\Instance\Domain\ValueObject\Week;

use api\Shared\Domain\Aggregate\AggregateRoot;

final class InstanceConquer extends AggregateRoot
{
    public function __construct(
        private UUID $idGuild,
        private NID $idConquer, 
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
        UUID $idGuild,
        NID $idConquer, 
        DamageDealt $damageDealt, 
        Available $active, 
        Week $week, 
        IsKilled $isKilled, 
        AmountOfKills $amountOfKills, 
        Available $available,
    ): self 
    {
        return new self(
            $idGuild,
            $idConquer, 
            $damageDealt, 
            $active, 
            $week, 
            $isKilled, 
            $amountOfKills, 
            $available,
        );
    }

    public static function fromPrimitives(
        $idGuild,
        $idConquer, 
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
            new NID($idConquer), 
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