<?php

declare(strict_types=1);

namespace api\Core\General\Boost\Domain;

use api\Shared\Domain\ValueObject\NID;
use api\Shared\Domain\ValueObject\Available;
use api\Core\Shared\Domain\ValueObject\Stats;
use api\Core\General\Object\Domain\Repository\IBoostRepository;

use api\Shared\Domain\Aggregate\AggregateRoot;

final class Boost extends AggregateRoot
{
    public function __construct(
        private NID   $id,
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
        private Available $available,
    )
    {
    }

    public static function create( 
        ?NID        $id,
        Stats       $attack, 
        Stats       $defense, 
        Stats       $towerAttack, 
        Stats       $towerDefense, 
        Stats       $hp, 
        Stats       $accuracy, 
        Stats       $speed, 
        Stats       $farming, 
        Stats       $steeling, 
        Stats       $wooding, 
        Available   $available,
    ): self 
    {
        return new self(
            $id,
            $idObject,
            $available
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
        int $wooding, 
        int $available,
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
            new Stats ($speed), 
            new Stats ($farming), 
            new Stats ($steeling), 
            new Stats ($wooding), 
            new Stats ($available)
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
            'available'            =>          $this->available->value()                    
        ];
    }

    public function getObjeto(): Objeto
    {
        return $this->objetoRepository->findObjetoById($this->idObject);
    }
}