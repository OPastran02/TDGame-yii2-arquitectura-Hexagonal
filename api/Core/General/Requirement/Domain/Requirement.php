<?php

declare(strict_types=1);

namespace api\Core\General\Requirement\Domain;

use api\Shared\Domain\ValueObject\{
    NID,
    ValueObject\Available
};

final class Requirement
{
    public function __construct(
        private NID $id,                     
        private int $guildLevel,             
        private int $guildExperience,        
        private int $guildRank,              
        private int $guildWins,              
        private int $guildMonsterKilled,     
        private int $guildBossKilled,        
        private int $playerOnGuildRank,      
        private int $playerOnGuildfights,        
        private int $playerOnGuildWins,      
        private int $playerRank,             
        private int $playerLevel,            
        private int $playerExperience,       
        private int $chapterFinished,        
        private int $battlePass,             
        private int $ultraPass,              
        private int $available           
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
        int $available  
    ): self 
    {
        return new self(
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
        return new self(
            new NID($id),                  
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