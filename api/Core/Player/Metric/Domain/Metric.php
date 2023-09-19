<?php

declare(strict_types=1);

namespace api\Core\Player\Metric\Domain;

use api\Shared\Domain\ValueObject\NID;
use api\Shared\Domain\ValueObject\UUID;
use api\Shared\Domain\ValueObject\Available;
use api\Shared\Domain\ValueObject\UnixTimestampDate;
use api\Core\Player\Metric\Domain\ValueObject\DamageDealt;
use api\Core\Player\Metric\Domain\ValueObject\Honor;
use api\Core\Player\Metric\Domain\ValueObject\LandsDestroyed;
use api\Core\Player\Metric\Domain\ValueObject\MaxPoints;
use api\Core\Player\Metric\Domain\ValueObject\MobsKilled;
use api\Core\Shared\Domain\ValueObject\Win;
use api\Core\Shared\Domain\ValueObject\Handicap;
use api\Core\Shared\Domain\ValueObject\Loss;
use api\Core\Shared\Domain\ValueObject\timePlayed;
use api\Shared\Domain\Aggregate\AggregateRoot;

final class Metric extends AggregateRoot
{
    public function __construct(
        private NID $id,
        private Win $win,
        private Loss $loss,
        private Handicap $handicap,
        private timePlayed $timePlayed,
        private MaxPoints $maxPoints,
        private DamageDealt $damageDealt,
        private LandsDestroyed $landsDestroyed,
        private MobsKilled $mobsKilled,
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
        MobsKilled $mobsKilled,
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
            $mobsKilled,
            $available,
        );
    }

    public static function fromPrimitives(
        ?string $id,
        int $win,
        int $loss,
        int $handicap,
        int $timePlayed,
        int $maxPoints,
        int $damageDealt,
        int $landsDestroyed,
        int $mobsKilled,
        int $available,
    ): self
    {
        return new Objeto(
            isset($id) ? new UUID($id):   null,
            new Win ($win),
            new Loss ($loss),
            new Handicap ($handicap),
            new timePlayed ($timePlayed),
            new MaxPoints ($maxPoints),
            new DamageDealt ($damageDealt),
            new LandsDestroyed ($landsDestroyed),
            new MobsKilled ($mobsKilled),
            new Available($available),
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          isset($this->id) ? $this->id->value() : null,
            'win'                   =>          $this->win->value(),
            'loss'                  =>          $this->loss->value(),
            'handicap'              =>          $this->handicap->value(),
            'timePlayed'            =>          $this->timePlayed->value(),
            'maxPoints'             =>          $this->maxPoints->value(),
            'damageDealt'           =>          $this->damageDealt->value(),
            'landsDestroyed'        =>          $this->landsDestroyed->value(),
            'mobsKilled'            =>          $this->mobsKilled->value(),
            'available'             =>          $this->available->value(),
        ];
    }
}