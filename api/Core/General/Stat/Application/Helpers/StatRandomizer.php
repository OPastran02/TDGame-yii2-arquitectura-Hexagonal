<?php

declare(strict_types=1);

namespace api\Core\General\Stat\Application\Helpers;

class StatRandomizer
{
    public function __construct()
    {
    }

    public function __invoke($rarity): int
    {
        $val = 2000;
        $stat = rand($val * $rarity, $val * ($rarity + 1));
        return $stat;
    }
}