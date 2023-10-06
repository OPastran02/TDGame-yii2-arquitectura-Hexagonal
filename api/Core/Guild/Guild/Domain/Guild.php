<?php

declare(strict_types=1);

namespace api\Core\Guild\Guild\Domain;

use api\Shared\Domain\ValueObject\{
    NID,
    UUID,
    Available
};
use api\Core\Guild\Guild\Domain\ValueObject\MaxMember;
use api\Core\Shared\Domain\ValueObject\{
    Experience,
    Level
};
use api\Core\General\Object\Domain\Objeto;
use api\Core\Guild\Stash\Domain\Stash;
use api\Core\Guild\Metric\Domain\GuildMetric;

final class Guild
{
    public function __construct(
        private UUID $id,
        private UUID $idObject,
        private UUID $idstash,
        private UUID $idmetrics,
        private MaxMember $maxMembers,
        private Experience $experience,
        private Level $level,
        private Available $available,
        private Objeto $objeto,
        private Stash $stash,
        private GuildMetric $metric
    )
    {}

    public static function create( 
        UUID $id,
        UUID $idObject,
        UUID $idstash,
        UUID $idmetrics,
        MaxMember $maxMembers,
        Experience $experience,
        Level $level,
        Available $available,
        Objeto $objeto,
        Stash $stash,
        GuildMetric $metric
    ): self 
    {
        return new self(
            $id,
            $idObject,
            $idstash,
            $idmetrics,
            $maxMembers,
            $experience,
            $level,
            $available,
            $objeto,
            $stash,
            $metric
        );
    }

    public static function fromPrimitives(
        string $id,
        string $idObject,
        string $idstash,
        string $idmetrics,
        int $maxMembers,
        int $experience,
        int $level,
        int $available,
        Objeto $objeto,
        Stash $stash,
        GuildMetric $metric
    ): self
    {
        return new self(
            new UUID($id),
            new UUID($idObject),
            new UUID($idstash),
            new UUID($idmetrics),
            new MaxMember($maxMembers),
            new Experience($experience),
            new Level($level),
            new Available($available),
            $objeto,
            $stash,
            $metric
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          $this->id->value(),
            'idObject'              =>          $this->idObject->value(),
            'idstash'               =>          $this->idstash->value(),
            'idmetrics'             =>          $this->idmetrics->value(),
            'maxMembers'            =>          $this->maxMembers->value(),
            'experience'            =>          $this->experience->value(),
            'level'                 =>          $this->level->value(),
            'available'             =>          $this->available->value(),
            'objeto'                =>          $this->objeto->toPrimitives(),
            'stash'                 =>          $this->stash->toPrimitives(),
            'metric'                =>          $this->metric->toPrimitives()
        ];
    }
}