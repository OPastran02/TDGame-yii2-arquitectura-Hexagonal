<?php

declare(strict_types=1);

namespace api\Core\Hero\Ability\Domain;

use api\Shared\Domain\ValueObject\{
    NID,
    Available
};
use api\Core\Hero\Ability\Domain\ValueObject\BlockAttack;
use api\Core\General\Object\Domain\Objeto; 

final class Ability
{
    public function __construct(
        private NID $id,
        private NID $idObject, 
        private BlockAttack $blockAttack, 
        private Available $melee, 
        private Available $fly, 
        private Available $ranged, 
        private Available $stealth, 
        private Available $available,
        private Objeto $objeto,
    )
    {
    }

    public static function create( 
        NID $id,
        NID $idObject, 
        BlockAttack $blockAttack, 
        Available $melee, 
        Available $fly, 
        Available $ranged, 
        Available $stealth, 
        Available $available,
        Objeto $objeto
    ): self 
    {
        return new self(
            $id,
            $idObject, 
            $blockAttack, 
            $melee, 
            $fly, 
            $ranged, 
            $stealth, 
            $available,
            $objeto
        );
    }

    public static function fromPrimitives(
        ?int $id,
        int $idObject, 
        string $blockAttack, 
        int $melee, 
        int $fly, 
        int $ranged, 
        int $stealth, 
        int $available,
        Objeto $objeto,
    ): self
    {
        return new self(
            isset($id) ? new NID($id):   null,
            new NID ($idObject), 
            new BlockAttack ($blockAttack), 
            new Available ($melee), 
            new Available ($fly), 
            new Available ($ranged), 
            new Available ($stealth), 
            new Available ($available),
            $objeto
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          isset($this->id) ? $this->id->value() : null,
            'idObject'              =>          $this->idObject->value(),            
            'blockAttack'           =>          $this->blockAttack->value(),                
            'melee'                 =>          $this->melee->value(),        
            'fly'                   =>          $this->fly->value(),        
            'ranged'                =>          $this->ranged->value(),            
            'stealth'               =>          $this->stealth->value(),            
            'available'             =>          $this->available->value(),
            'objeto'                =>          $this->objeto->toPrimitives()
        ];
    }
}