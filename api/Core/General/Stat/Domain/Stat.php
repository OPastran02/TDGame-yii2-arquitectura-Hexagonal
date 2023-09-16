<?php

declare(strict_types=1);

namespace api\Core\General\Object\Domain;

use api\Shared\Domain\ValueObject\UUID;
use api\Shared\Domain\ValueObject\UnixTimestampDate;
use api\Shared\Domain\ValueObject\Available;
use api\Core\Shared\Domain\ValueObject\Stats;
use api\Core\Shared\Domain\ValueObject\Increment;

use api\Shared\Domain\Aggregate\AggregateRoot;

final class Objeto extends AggregateRoot
{
    public function __construct(
        private UUID|null $id,
        private Stats $attack,
        private Stats $defense,
        private Stats $towerAttack,
        private Stats $towerDefense,
        private Stats $hp,
        private Stats $accuracy,
        private Stats $farming,
        private Stats $steeling,
        private Stats $wooding,
        private Increment $incAttack,
        private Increment $incDefense,
        private Increment $incTowerAttack,
        private Increment $incTowerDefense,
        private Increment $inchp,
        private Increment $incaccuracy,
        private Increment $incfarming,
        private Increment $incsteeling,
        private Increment $incwooding,
        private Available $available,
        private UnixTimestampDate|null $createdAt,
        private UnixTimestampDate|null $updatedAt,
        private UUID|null $createdBy,
        private UUID|null $updatedBy
    )
    {
    }

    public static function create( 
        UUID|null $id,
        Stats $attack,
        Stats $defense,
        Stats $towerAttack,
        Stats $towerDefense,
        Stats $hp,
        Stats $accuracy,
        Stats $farming,
        Stats $steeling,
        Stats $wooding,
        Increment $incAttack,
        Increment $incDefense,
        Increment $incTowerAttack,
        Increment $incTowerDefense,
        Increment $inchp,
        Increment $incaccuracy,
        Increment $incfarming,
        Increment $incsteeling,
        Increment $incwooding,
        Available $available,
        UnixTimestampDate|null $createdAt,
        UnixTimestampDate|null $updatedAt,
        UUID|null $createdBy,
        UUID|null $updatedBy
    ): self 
    {
        return $obj = new Objeto(
            $id,
            $attack,
            $defense,
            $towerAttack,
            $towerDefense,
            $hp,
            $accuracy,
            $farming,
            $steeling,
            $wooding,
            $incAttack,
            $incDefense,
            $incTowerAttack,
            $incTowerDefense,
            $inchp,
            $incaccuracy,
            $incfarming,
            $incsteeling,
            $incwooding,
            $available,
            $createdAt,
            $updatedAt,
            $createdBy,
            $updatedBy
        );
    }

    public static function fromPrimitives(
        ?string $id,
        int $attack,
        int $defense,
        int $towerAttack,
        int $towerDefense,
        int $hp,
        int $accuracy,
        int $farming,
        int $steeling,
        int $wooding,
        int $incAttack,
        int $incDefense,
        int $incTowerAttack,
        int $incTowerDefense,
        int $inchp,
        int $incaccuracy,
        int $incfarming,
        int $incsteeling,
        int $incwooding,
        int $available,
        ?int $createdAt,
        ?int $updatedAt,
        ?string $createdBy,
        ?string $updatedBy
    ): self
    {
        return new Objeto(
            isset($id) ? new NID($id):   null,
            new Stats ($attack),
            new Stats ($defense),
            new Stats ($towerAttack),
            new Stats ($towerDefense),
            new Stats ($hp),
            new Stats ($accuracy),
            new Stats ($farming),
            new Stats ($steeling),
            new Stats ($wooding),
            new Increment ($incAttack),
            new Increment ($incDefense),
            new Increment ($incTowerAttack),
            new Increment ($incTowerDefense),
            new Increment ($inchp),
            new Increment ($incaccuracy),
            new Increment ($incfarming),
            new Increment ($incsteeling),
            new Increment ($incwooding),
            new Available ($available),
            isset($createdAt) ? new UnixTimestampDate($createdAt):null,
            isset($updatedAt) ? new UnixTimestampDate($updatedAt):null,
            isset($createdBy) ? new UUID($createdBy):null,
            isset($updatedBy) ? new UUID($updatedBy):null,
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          isset($this->id) ? $this->id->value() : null,
            'attack'                =>          $this->attack->value(),
            'defense'               =>          $this->defense->value(),
            'towerAttack'           =>          $this->towerAttack->value(),
            'towerDefense'          =>          $this->towerDefense->value(),
            'hp'                    =>          $this->hp->value(),
            'accuracy'              =>          $this->accuracy->value(),
            'farming'               =>          $this->farming->value(),
            'steeling'              =>          $this->steeling->value(),
            'wooding'               =>          $this->wooding->value(),
            'incAttack'             =>          $this->incAttack->value(),
            'incDefense'            =>          $this->incDefense->value(),
            'incTowerAttack'        =>          $this->incTowerAttack->value(),
            'incTowerDefense'       =>          $this->incTowerDefense->value(),
            'inchp'                 =>          $this->inchp->value(),
            'incaccuracy'           =>          $this->incaccuracy->value(),
            'incfarming'            =>          $this->incfarming->value(),
            'incsteeling'           =>          $this->incsteeling->value(),
            'incwooding'            =>          $this->incwooding->value(),
            'available'             =>          $this->available->value(),
            'available'             =>          $this->available->value(),
            'created_at'            =>          isset($createdAt) ? $this->createdAt->getTimestamp() : null,
            'updated_at'            =>          isset($updatedAt) ? $this->updatedAt->getTimestamp() : null,
            'created_by'            =>          isset($createdBy) ? $this->createdBy->value() : null,
            'updated_by'            =>          isset($updatedBy) ? $this->updatedBy->value() : null
        ];
    }
}