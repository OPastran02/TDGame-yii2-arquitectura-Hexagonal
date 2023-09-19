<?php

declare(strict_types=1);

namespace api\Core\Player\RankedMetric\Domain;

use api\Shared\Domain\ValueObject\NID;
use api\Shared\Domain\ValueObject\UUID;
use api\Shared\Domain\ValueObject\Available;
use api\Shared\Domain\ValueObject\UnixTimestampDate;
use api\Core\Player\Metric\Domain\ValueObject\MaxPosition;
use api\Core\Shared\Domain\ValueObject\Win;
use api\Core\Shared\Domain\ValueObject\Handicap;
use api\Core\Shared\Domain\ValueObject\Loss;
use api\Core\Shared\Domain\ValueObject\timePlayed;
use api\Shared\Domain\Aggregate\AggregateRoot;

final class RankedMetric extends AggregateRoot
{
    public function __construct(
        private UUID $id,
        private Win $win,
        private Loss $loss,
        private Handicap $handicap,
        private timePlayed $timePlayed,
        private UUID $rank,
        private MaxPosition $maxPosition,
        private Available $available,
    )
    {}

    public static function create( 
        UUID $id,
        Win $win,
        Loss $loss,
        Handicap $handicap,
        timePlayed $timePlayed,
        UUID $rank,
        MaxPosition $maxPosition,
        Available $available,
    ): self 
    {
        return new self(
            $id,
            $win,
            $loss,
            $handicap,
            $timePlayed,
            $rank,
            $maxPosition,
            $available,
        );
    }

    public static function fromPrimitives(
        ?string $id,
        int $win,
        int $loss,
        int $handicap,
        int $timePlayed,
        int $rank,
        int $maxPosition,
        int $available,
    ): self
    {
        return new Objeto(
            isset($id) ? new UUID($id):   null,
            new Win($win),
            new Win($win),
            new Loss($loss),
            new Handicap($handicap),
            new timePlayed($timePlayed),
            new UUID($rank),
            new MaxPosition($maxPosition),
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
            'rank'                  =>          $this->rank->value(),
            'maxPosition'           =>          $this->maxPosition->value(),
            'available'             =>          $this->available->value(),
        ];
    }
}