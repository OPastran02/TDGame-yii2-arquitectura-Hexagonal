<?php

declare(strict_types=1);

namespace api\Core\Player\Status\Application\Helpers;

class DailyAdsReached
{
    private int $dailyAds;

    public function __construct(int $dailyAds)
    {
        $this->dailyAds=$dailyAds;
    }

    public function __invoke(): bool
    {
        return $this->dailyAds >= 20;
    }
}