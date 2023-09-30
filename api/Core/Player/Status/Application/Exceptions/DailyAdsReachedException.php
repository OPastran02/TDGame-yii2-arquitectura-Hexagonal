<?php

declare(strict_types=1);

namespace api\Core\Player\Status\Application\Exceptions;

use api\Shared\Domain\DomainError;

final class DailyAdsReachedException extends DomainError
{
    public function __construct (private int $addsReached)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'daily_ads_reached';
    }

    protected function errorMessage(): string
    {
        return sprintf('you reached the maximum daily ads permitted');
    }
}