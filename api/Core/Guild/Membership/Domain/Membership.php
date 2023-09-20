<?php

declare(strict_types=1);

namespace api\Core\Guild\Membership\Domain;

use api\Shared\Domain\ValueObject\UUID;
use api\Shared\Domain\ValueObject\Available;
use api\Core\Shared\Domain\ValueObject\Wood;
use api\Core\Shared\Domain\ValueObject\Steel;
use api\Core\Shared\Domain\ValueObject\Farm;
use api\Core\Guild\Membership\Domain\Repository\IMembershipRepository;

use api\Shared\Domain\Aggregate\AggregateRoot;

final class Membership extends AggregateRoot
{
    public function __construct(
        private ?UUID $id,
        private UUID $idPlayer,
        private UUID $idguild,
        private NID $guildTitle,
        private int $weeklydamage,
        private int $totaldamage,
        private Wood $wood, 
        private Steel $steel,  
        private Farm $farm, 
        private Available $available,
    )
    {
    }

    public static function create( 
        ?UUID $id,
        UUID $idPlayer,
        UUID $idguild,
        NID $guildTitle,
        int $weeklydamage,
        int $totaldamage,
        Wood $wood, 
        Steel $steel,  
        Farm $farm, 
        Available $available
    ): self 
    {
        return new self(
            $id,
            $idPlayer,
            $idguild,
            $guildTitle,
            $weeklydamage,
            $totaldamage,
            $wood,
            $steel,
            $farm,
            $available
        );
    }

    public static function fromPrimitives(
        ?int $id,
        string $idPlayer,
        string $idguild,
        int $guildTitle,
        int $weeklydamage,
        int $totaldamage,
        int $wood,
        int $steel,
        int $farm,
        int $available
    ): self
    {
        return new Objeto(
            isset($id) ? new UUID($id):   null,
            new UUID($idPlayer),
            new UUID($idguild),
            new NID($guildTitle),
            $weeklydamage,
            $totaldamage,
            new Wood($wood), 
            new Steel($steel), 
            new Farm($farm), 
            new Available($available),
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          isset($this->id) ? $this->id->value() : null,
            'idPlayer'              =>          $this->idPlayer->value(),
            'idguild'               =>          $this->idguild->value(),
            'guildTitle'            =>          $this->guildTitle->value(),
            'weeklydamage'          =>          $this->weeklydamage,
            'totaldamage'           =>          $this->totaldamage,
            'wood'                  =>          $this->wood->value(), 
            'steel'                 =>          $this->steel->value(), 
            'farm'                  =>          $this->farm->value(), 
            'available'             =>          $this->available->value(),
        ];
    }

}