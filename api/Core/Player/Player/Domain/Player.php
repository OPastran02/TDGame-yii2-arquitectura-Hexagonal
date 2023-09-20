<?php

declare(strict_types=1);

namespace api\Core\Player\Player\Domain;

use api\Shared\Domain\ValueObject\NID;
use api\Shared\Domain\ValueObject\UUID;
use api\Shared\Domain\ValueObject\Available;
use api\Core\Shared\Domain\ValueObject\Experience;
use api\Core\Shared\Domain\ValueObject\Level;

use api\Shared\Domain\Aggregate\AggregateRoot;

final class Player extends AggregateRoot
{
    public function __construct(
        private UUID $id,            
        private UUID $idwallet,         
        private UUID $idavatar,         
        private UUID $idmetrics,        
        private UUID $idrankedMetrics,  
        private UUID $idstatus,         
        private UUID $idland,           
        private Experience $experience,       
        private Level $level,            
        private Available $available,
    )
    {}

    public static function create( 
        UUID $id,
        UUID $idwallet,         
        UUID $idavatar,         
        UUID $idmetrics,        
        UUID $idrankedMetrics,  
        UUID $idstatus,         
        UUID $idland,           
        Experience $experience,       
        Level $level,        
        Available $available,
    ): self 
    {
        return new self(
            $id,
            $idwallet,         
            $idavatar,         
            $idmetrics,        
            $idrankedMetrics,  
            $idstatus,         
            $idland,           
            $experience,       
            $level,        
            $available,
        );
    }

    public static function fromPrimitives(
        ?string $id,
        string $idwallet,         
        string $idavatar,         
        string $idmetrics,        
        string $idrankedMetrics,  
        string $idstatus,         
        string $idland,           
        int $experience,       
        int $level,   
        int $available,
    ): self
    {
        return new Objeto(
            isset($id) ? new UUID($id):   null,
            new UUID($idwallet),         
            new UUID($idavatar),         
            new UUID($idmetrics),        
            new UUID($idrankedMetrics),  
            new UUID($idstatus),         
            new UUID($idland),           
            new Experience($experience),       
            new Level($level),        
            new Available($available),
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          isset($this->id) ? $this->id->value() : null,
            'idwallet'              =>          $this->available->value(),         
            'idavatar'              =>          $this->available->value(),         
            'idmetrics'             =>          $this->available->value(),        
            'idrankedMetrics'       =>          $this->available->value(),  
            'idstatus'              =>          $this->available->value(),         
            'idland'                =>          $this->available->value(),           
            'experience'            =>          $this->available->value(),       
            'level'                 =>          $this->available->value(),   
            'available'             =>          $this->available->value(),
        ];
    }
}