<?php

declare(strict_types=1);

namespace api\Core\Guild\GuildMetric\Domain;

use api\Shared\Domain\ValueObject\NID;
use api\Shared\Domain\ValueObject\UUID;
use api\Shared\Domain\ValueObject\Available;
use api\Core\Guild\GuildMetric\Domain\ValueObject\MaxMember;
use api\Core\Shared\Domain\ValueObject\Experience;
use api\Core\Shared\Domain\ValueObject\Level;
use api\Shared\Domain\Aggregate\AggregateRoot;

final class Guild extends AggregateRoot
{
    public function __construct(
        private UUID $id,
        private NID $idObject,
        private UUID $stash,
        private UUID $metrics,
        private MaxMember $maxMembers,
        private Experience $experience,
        private Level $level,
        private Available $available,
    )
    {}

    public static function create( 
        UUID $id,
        NID $idObject,
        UUID $stash,
        UUID $metrics,
        MaxMember $maxMembers,
        Experience $experience,
        Level $level,
        Available $available,
    ): self 
    {
        return new self(
            $id,
            $idObject,
            $stash,
            $metrics,
            $maxMembers,
            $experience,
            $level,
            $available,
        );
    }

    public static function fromPrimitives(
        ?string $id,
        int $idObject,
        string $stash,
        string $metrics,
        int $maxMembers,
        int $experience,
        int $level,
        int $available,
    ): self
    {
        return new Objeto(
            isset($id) ? new UUID($id):   null,
            new Win ($win),
            new NID($idObject),
            new UUID($stash),
            new UUID($metrics),
            new MaxMember($maxMembers),
            new Experience($experience),
            new Level($level),
            new Available($available),
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          isset($this->id) ? $this->id->value() : null,
            'idObject'              =>          $this->idObject->value(),
            'stash'                 =>          $this->stash->value(),
            'metrics'               =>          $this->metrics->value(),
            'maxMembers'            =>          $this->maxMembers->value(),
            'experience'            =>          $this->experience->value(),
            'level'                 =>          $this->level->value(),
            'available'             =>          $this->available->value(),
        ];
    }
}