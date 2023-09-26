<?php

declare(strict_types=1);

namespace api\Core\Hero\Boost\Domain;

use api\Shared\Domain\ValueObject\NID;
use api\Shared\Domain\ValueObject\Available;
use api\Core\Shared\Domain\ValueObject\Increment;
use api\Core\Hero\Boost\Domain\Repository\IBoostRepository;

use api\Shared\Domain\Aggregate\AggregateRoot;

final class Boost extends AggregateRoot
{
    public function __construct(
        private NID   $id,
        private Increment $attack, 
        private Increment $defense, 
        private Increment $towerAttack, 
        private Increment $towerDefense, 
        private Increment $hp, 
        private Increment $accuracy, 
        private Increment $speed, 
        private Increment $farming, 
        private Increment $steeling, 
        private Increment $wooding
    )
    {
    }

    public static function create( 
        ?NID        $id,
        Increment   $attack, 
        Increment   $defense, 
        Increment   $towerAttack, 
        Increment   $towerDefense, 
        Increment   $hp, 
        Increment   $accuracy, 
        Increment   $speed, 
        Increment   $farming, 
        Increment   $steeling, 
        Increment   $wooding
    ): self 
    {
        return new self(
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
            $wooding
        );
    }

    public static function fromPrimitives(
        ?int $id,
        int $attack, 
        int $defense, 
        int $towerAttack, 
        int $towerDefense, 
        int $hp, 
        int $accuracy, 
        int $speed, 
        int $farming, 
        int $steeling, 
        int $wooding
    ): self
    {
        return new self(
            isset($id) ? new NID($id):   null,
            new Increment ($attack), 
            new Increment ($defense), 
            new Increment ($towerAttack), 
            new Increment ($towerDefense), 
            new Increment ($hp), 
            new Increment ($accuracy), 
            new Increment ($speed), 
            new Increment ($farming), 
            new Increment ($steeling), 
            new Increment ($wooding)
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                   =>         isset($this->id) ? $this->id->value() : null,
            'attack'               =>          $this->attack->value(),                
            'defense'              =>          $this->defense->value(),                
            'towerAttack'          =>          $this->towerAttack->value(),                    
            'towerDefense'         =>          $this->towerDefense->value(),                        
            'hp'                   =>          $this->hp->value(),            
            'accuracy'             =>          $this->accuracy->value(),                    
            'speed'                =>          $this->speed->value(),                
            'farming'              =>          $this->farming->value(),                
            'steeling'             =>          $this->steeling->value(),                    
            'wooding'              =>          $this->wooding->value(),               
        ];
    }

}