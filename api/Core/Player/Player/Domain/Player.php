<?php

declare(strict_types=1);

namespace api\Core\Player\Player\Domain;

use api\Shared\Domain\ValueObject\{
    NID,
    UUID,
    Available
};
use api\Core\Shared\Domain\ValueObject\{
    Experience,
    Level
};
use api\Core\Player\Wallet\Domain\Wallet;
use api\Core\Player\Avatar\Domain\Avatar;
use api\Core\Player\Metric\Domain\Metric;
use api\Core\Player\Status\Domain\Status;
use api\Core\General\Land\Domain\Land;

final class Player
{
    public function __construct(
        private UUID $id,            
        private UUID $idwallet,         
        private UUID $idavatar,         
        private UUID $idmetrics,        
        private UUID $idstatus,         
        private UUID $idland,           
        private Experience $experience,       
        private Level $level,            
        private Available $available,
        private Wallet $wallet,
        private Avatar $avatar,
        private Metric $metric,
        private Status $status,
        private Land $land
    )
    {}

    public static function create( 
        UUID $id,
        UUID $idwallet,         
        UUID $idavatar,         
        UUID $idmetrics,        
        UUID $idstatus,         
        UUID $idland,           
        Experience $experience,       
        Level $level,        
        Available $available,
        Wallet $wallet,
        Avatar $avatar,
        Metric $metric,
        Status $status,
        Land $land
    ): self 
    {
        return new self(
            $id,
            $idwallet,         
            $idavatar,         
            $idmetrics,        
            $idstatus,         
            $idland,           
            $experience,       
            $level,        
            $available,
            $wallet,
            $avatar,
            $metric,
            $status,
            $land
        );
    }

    public static function fromPrimitives(
        string $id,
        string $idwallet,         
        string $idavatar,         
        string $idmetrics,         
        string $idstatus,         
        string $idland,           
        int $experience,       
        int $level,   
        int $available,
        Wallet $wallet,
        Avatar $avatar,
        Metric $metric,
        Status $status,
        Land   $land
    ): self
    {
        return new self(
            new UUID($id),
            new UUID($idwallet),         
            new UUID($idavatar),         
            new UUID($idmetrics),        
            new UUID($idstatus),         
            new UUID($idland),           
            new Experience($experience),       
            new Level($level),        
            new Available($available),
            $wallet,
            $avatar,
            $metric,
            $status,
            $land
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          $this->id->value(),
            'idwallet'              =>          $this->idwallet->value(),         
            'idavatar'              =>          $this->idavatar->value(),         
            'idmetrics'             =>          $this->idmetrics->value(), 
            'idstatus'              =>          $this->idstatus->value(),         
            'idland'                =>          $this->idland->value(),           
            'experience'            =>          $this->experience->value(),       
            'level'                 =>          $this->level->value(),   
            'available'             =>          $this->available->value(),
            'wallet'                =>          $this->wallet->toPrimitives(),
            'avatar'                =>          $this->avatar->toPrimitives(),
            'metric'                =>          $this->metric->toPrimitives(),
            'status'                =>          $this->status->toPrimitives(),
            'land'                  =>          $this->land->toPrimitives(),
        ];
    }
}