<?php

declare(strict_types=1);

namespace api\Core\General\Requirement\Domain;

use api\Shared\Domain\ValueObject\NID;
use api\Shared\Domain\ValueObject\Available;

use api\Shared\Domain\Aggregate\AggregateRoot;

final class Requirement extends AggregateRoot
{
    public function __construct(
        NID $id,                     
        int $guildLevel,             
        int $guildExperience,        
        int $guildRank,              
        int $guildWins,              
        int $guildMonsterKilled,     
        int $guildBossKilled,        
        int $playerOnGuildRank,      
        int $playerOnGuildfights,        
        int $playerOnGuildWins,      
        int $playerRank,             
        int $playerLevel,            
        int $playerExperience,       
        int $chapterFinished,        
        int $battlePass,             
        int $ultraPass,              
        int $available,              
    )
    {
    }

    public static function create( 
        NID $id,                     
        int $guildLevel,             
        int $guildExperience,        
        int $guildRank,              
        int $guildWins,              
        int $guildMonsterKilled,     
        int $guildBossKilled,        
        int $playerOnGuildRank,      
        int $playerOnGuildfights,        
        int $playerOnGuildWins,      
        int $playerRank,             
        int $playerLevel,            
        int $playerExperience,       
        int $chapterFinished,        
        int $battlePass,             
        int $ultraPass,              
        int $available,   
    ): self 
    {
        return $obj = new Requirement(
            $id,                     
            $guildLevel,             
            $guildExperience,        
            $guildRank,              
            $guildWins,              
            $guildMonsterKilled,     
            $guildBossKilled,        
            $playerOnGuildRank,      
            $playerOnGuildfights,        
            $playerOnGuildWins,      
            $playerRank,             
            $playerLevel,            
            $playerExperience,       
            $chapterFinished,        
            $battlePass,             
            $ultraPass,              
            $available,   
        );
    }

    public static function fromPrimitives(
        int $id,                     
        int $guildLevel,             
        int $guildExperience,        
        int $guildRank,              
        int $guildWins,              
        int $guildMonsterKilled,     
        int $guildBossKilled,        
        int $playerOnGuildRank,      
        int $playerOnGuildfights,        
        int $playerOnGuildWins,      
        int $playerRank,             
        int $playerLevel,            
        int $playerExperience,       
        int $chapterFinished,        
        int $battlePass,             
        int $ultraPass,              
        int $available,   
    ): self
    {
        return new Requirement(
            $id,                     
            $guildLevel,             
            $guildExperience,        
            $guildRank,              
            $guildWins,              
            $guildMonsterKilled,     
            $guildBossKilled,        
            $playerOnGuildRank,      
            $playerOnGuildfights,        
            $playerOnGuildWins,      
            $playerRank,             
            $playerLevel,            
            $playerExperience,       
            $chapterFinished,        
            $battlePass,             
            $ultraPass,              
            $available, 
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          $this->id->value(),
            'guildLevel'            =>          $this->guildLevel,             
            'guildExperience'       =>          $this->guildExperience,        
            'guildRank'             =>          $this->guildRank,              
            'guildWins'             =>          $this->guildWins,              
            'guildMonsterKilled'    =>          $this->guildMonsterKilled,     
            'guildBossKilled'       =>          $this->guildBossKilled,        
            'playerOnGuildRank'     =>          $this->playerOnGuildRank,      
            'playerOnGuildfights'   =>          $this->playerOnGuildfights,        
            'playerOnGuildWins'     =>          $this->playerOnGuildWins,      
            'playerRank'            =>          $this->playerRank,             
            'playerLevel'           =>          $this->playerLevel,            
            'playerExperience'      =>          $this->playerExperience,       
            'chapterFinished'       =>          $this->chapterFinished,        
            'battlePass'            =>          $this->battlePass,             
            'ultraPass'             =>          $this->ultraPass,              
            'available'             =>          $this->available, 
        ];
    }
}