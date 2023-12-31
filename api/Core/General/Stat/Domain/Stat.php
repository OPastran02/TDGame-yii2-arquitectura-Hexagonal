<?php

declare(strict_types=1);

namespace api\Core\General\Stat\Domain;

use api\Shared\Domain\ValueObject\{
    UUID,
    Available
};

use api\Core\Shared\Domain\ValueObject\{
    Stats,
    Increment
};

final class Stat
{
    public function __construct(
        private UUID|null $id,
        private Stats $attack,
        private Stats $defense,
        private Stats $towerAttack,
        private Stats $towerDefense,
        private Stats $hp,
        private Stats $accuracy,
        private Stats $speed,
        private Stats $farming,
        private Stats $steeling,
        private Stats $wooding,
        private Increment $incAttack,
        private Increment $incDefense,
        private Increment $inchp,
        private Increment $incTowerAttack,
        private Increment $incTowerDefense,
        private Increment $incAccuracy,
        private Increment $incSpeed,
        private Increment $incFarming,
        private Increment $incSteeling,
        private Increment $incWooding,
        private Stats $powerLevel,
        private Available $available,
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
        Stats $speed,
        Stats $farming,
        Stats $steeling,
        Stats $wooding,
        Increment $incAttack,
        Increment $incDefense,
        Increment $inchp,
        Increment $incTowerAttack,
        Increment $incTowerDefense,
        Increment $incAccuracy,
        Increment $incSpeed,
        Increment $incFarming,
        Increment $incSteeling,
        Increment $incWooding,
        Stats $powerLevel,
        Available $available,
    ): self 
    {
        return $obj = new self(
            $id,
            $attack,
            $defense,
            $towerAttack,
            $towerDefense,
            $hp,
            $accuracy,
            $speed,
            $farming,
            $steeling,
            $wooding,
            $incAttack,
            $incDefense,
            $inchp,
            $incTowerAttack,
            $incTowerDefense,
            $incAccuracy,
            $incSpeed,
            $incFarming,
            $incSteeling,
            $incWooding,
            $powerLevel,
            $available,
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
        int $speed,
        int $farming,
        int $steeling,
        int $wooding,
        int $incAttack,
        int $incDefense,
        int $inchp,
        int $incTowerAttack,
        int $incTowerDefense,
        int $incAccuracy,
        int $incSpeed,
        int $incFarming,
        int $incSteeling,
        int $incWooding,
        int $powerLevel,
        int $available,
    ): self
    {
        return new Stat(
            isset($id) ? new UUID($id):   null,
            new Stats ($attack),
            new Stats ($defense),
            new Stats ($towerAttack),
            new Stats ($towerDefense),
            new Stats ($hp),
            new Stats ($accuracy),
            new Stats ($speed),
            new Stats ($farming),
            new Stats ($steeling),
            new Stats ($wooding),
            new Increment ($incAttack),
            new Increment ($incDefense),
            new Increment ($inchp),
            new Increment ($incTowerAttack),
            new Increment ($incTowerDefense),
            new Increment ($incAccuracy),
            new Increment ($incSpeed),
            new Increment ($incFarming),
            new Increment ($incSteeling),
            new Increment ($incWooding),
            new Stats ($powerLevel),
            new Available ($available),
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
            'speed'                 =>          $this->speed->value(),
            'farming'               =>          $this->farming->value(),
            'steeling'              =>          $this->steeling->value(),
            'wooding'               =>          $this->wooding->value(),
            'incAttack'             =>          $this->incAttack->value(),
            'incDefense'            =>          $this->incDefense->value(),
            'inchp'                 =>          $this->inchp->value(),
            'incTowerAttack'        =>          $this->incTowerAttack->value(),
            'incTowerDefense'       =>          $this->incTowerDefense->value(),    
            'incAccuracy'           =>          $this->incAccuracy->value(),
            'incSpeed'              =>          $this->incSpeed->value(),
            'incFarming'            =>          $this->incFarming->value(),
            'incSteeling'           =>          $this->incSteeling->value(),
            'incWooding'            =>          $this->incWooding->value(),
            'powerLevel'            =>          $this->powerLevel->value(),
            'available'             =>          $this->available->value(),
        ];
    }
}