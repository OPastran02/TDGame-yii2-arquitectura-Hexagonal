<?php

declare(strict_types=1);

namespace api\Core\Player\Wallet\Domain;

use api\Shared\Domain\ValueObject\UUID;
use api\Shared\Domain\ValueObject\Available;
use api\Core\Shared\Domain\ValueObject\Bronze;
use api\Core\Shared\Domain\ValueObject\Silver;
use api\Core\Shared\Domain\ValueObject\Gold;
use api\Core\Shared\Domain\ValueObject\Crystal;


use api\Shared\Domain\Aggregate\AggregateRoot;

final class Wallet extends AggregateRoot
{
    public function __construct(
        private UUID $id,
        private Bronze $bronze,
        private Silver $silver,
        private Gold $gold,
        private Crystal $crystal,
        private Available $available,
    )
    {}

    public static function create( 
        UUID $id,
        Bronze $bronze,
        Silver $silver,
        Gold $gold,
        Crystal $crystal,
        Available $available,
    ): self 
    {
        return new self(
            $id,
            $bronze,
            $silver,
            $gold,
            $crystal,
            $available,
        );
    }

    public static function fromPrimitives(
        ?string $id,
        int $bronze,
        int $silver,
        int $gold,
        int $crystal,
        int $available,
    ): self
    {
        return new Objeto(
            isset($id) ? new UUID($id):   null,
            new Honor($honor),
            new UnixTimestampDate($lastLogin),
            new BattlePass($battlePass),
            new UltraPass($ultraPass),
            new DailyAdsViewed($dailyAdsViewed),
            new AdsViewed($adsViewed),
            new Available($active),
            new Available($available),
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          isset($this->id) ? $this->id->value() : null,
            'bronze'                =>          $this->bronze->value(),
            'silver'                =>          $this->silver->value(),
            'gold'                  =>          $this->gold->value(),
            'crystal'               =>          $this->crystal->value(),
            'available'             =>          $this->available->value(),
            'available'             =>          $this->available->value(),
        ];
    }
}