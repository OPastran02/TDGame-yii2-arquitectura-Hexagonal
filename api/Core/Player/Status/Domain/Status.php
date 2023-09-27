<?php

declare(strict_types=1);

namespace api\Core\Player\Status\Domain;

use api\Shared\Domain\ValueObject\NID;
use api\Shared\Domain\ValueObject\UUID;
use api\Shared\Domain\ValueObject\Available;
use api\Shared\Domain\ValueObject\UnixTimestampDate;
use api\Core\Player\Status\Domain\ValueObject\AdsViewed;
use api\Core\Player\Status\Domain\ValueObject\BattlePass;
use api\Core\Player\Status\Domain\ValueObject\DailyAdsViewed;
use api\Core\Player\Status\Domain\ValueObject\Honor;
use api\Core\Player\Status\Domain\ValueObject\UltraPass;

use api\Shared\Domain\Aggregate\AggregateRoot;

final class Status extends AggregateRoot
{
    public function __construct(
        private UUID $id,
        private Honor $honor,
        private UnixTimestampDate $lastLogin,
        private BattlePass $battlePass,
        private UltraPass $ultraPass,
        private DailyAdsViewed $dailyAdsViewed,
        private AdsViewed $adsViewed,
        private Available $active,
        private Available $available,
    )
    {}

    public static function create( 
        UUID $id,
        Honor $honor,
        UnixTimestampDate $lastLogin,
        BattlePass $battlePass,
        UltraPass $ultraPass,
        DailyAdsViewed $dailyAdsViewed,
        AdsViewed $adsViewed,
        Available $active,
        Available $available,
    ): self 
    {
        return new self(
            $id,
            $honor,
            $lastLogin,
            $battlePass,
            $ultraPass,
            $dailyAdsViewed,
            $adsViewed,
            $active,
            $available,
        );
    }

    public static function fromPrimitives(
        ?string $id,
        int $honor,
        int $lastLogin,
        int $battlePass,
        int $ultraPass,
        int $dailyAdsViewed,
        int $adsViewed,
        int $active,
        int $available,
    ): self
    {
        return new self(
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
            'honor'                 =>          $this->honor->value(),
            'lastLogin'             =>          $this->lastLogin->value(),
            'battlePass'            =>          $this->battlePass->value(),
            'ultraPass'             =>          $this->ultraPass->value(),
            'dailyAdsViewed'        =>          $this->dailyAdsViewed->value(),
            'adsViewed'             =>          $this->adsViewed->value(),
            'active'                =>          $this->active->value(),
            'available'             =>          $this->available->value(),
        ];
    }
}