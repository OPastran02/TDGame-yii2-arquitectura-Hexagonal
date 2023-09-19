<?php

declare(strict_types=1);

namespace api\Core\Player\Wallet\Domain;

use api\Shared\Domain\Collection;

final class Wallets extends Collection
{
    protected function type(): string
    {
        return Wallet::class;
    }
}