<?php

declare(strict_types=1);

namespace api\Core\Guild\Metric\Domain;

use api\Shared\Domain\ValueObject\{
    NID,
    UUID,
    Available,
    UnixTimestampDate
};
use api\Core\Guild\Metric\Domain\ValueObject\{
    DamageDealt,
    Honor,
    LandsDestroyed,
    MaxPoints,
    MobsKilled
};
use api\Core\Shared\Domain\ValueObject\{
    Win,
    Handicap,
    Loss,

};
use api\Shared\Domain\ValueObject\TimePlayed;

final class GuildMetric
{
    public function __construct(
        private UUID $id,
        private Win $win,
        private Loss $loss,
        private Handicap $handicap,
        private TimePlayed $timePlayed,
        private MaxPoints $maxPoints,
        private DamageDealt $damageDealt,
        private LandsDestroyed $landsDestroyed,
        private MobsKilled $mobskilled,
        private Available $available,
    )
    {}

    public static function create( 
        UUID $id,
        Win $win,
        Loss $loss,
        Handicap $handicap,
        timePlayed $timePlayed,
        MaxPoints $maxPoints,
        DamageDealt $damageDealt,
        LandsDestroyed $landsDestroyed,
        MobsKilled $mobskilled,
        Available $available,
    ): self 
    {
        return new self(
            $id,
            $win,
            $loss,
            $handicap,
            $timePlayed,
            $maxPoints,
            $damageDealt,
            $landsDestroyed,
            $mobskilled,
            $available,
        );
    }

    public static function fromPrimitives(
        string $id,
        int $win,
        int $loss,
        int $handicap,
        int $timePlayed,
        int $maxPoints,
        int $damageDealt,
        int $landsDestroyed,
        int $mobskilled,
        int $available,
    ): self
    {
        return new self(
            new UUID($id),
            new Win ($win),
            new Loss ($loss),
            new Handicap ($handicap),
            new timePlayed ($timePlayed),
            new MaxPoints ($maxPoints),
            new DamageDealt ($damageDealt),
            new LandsDestroyed ($landsDestroyed),
            new MobsKilled ($mobskilled),
            new Available($available),
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          $this->id->value(),
            'win'                   =>          $this->win->value(),
            'loss'                  =>          $this->loss->value(),
            'handicap'              =>          $this->handicap->value(),
            'timePlayed'            =>          $this->timePlayed->value(),
            'maxPoints'             =>          $this->maxPoints->value(),
            'damageDealt'           =>          $this->damageDealt->value(),
            'landsDestroyed'        =>          $this->landsDestroyed->value(),
            'mobsKilled'            =>          $this->mobskilled->value(),
            'available'             =>          $this->available->value(),
        ];
    }
}