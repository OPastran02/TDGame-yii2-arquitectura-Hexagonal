<?php

declare(strict_types=1);

namespace api\Core\General\Stat\Application\Helpers;

class IncrementRandomizer
{
    public function __construct()
    {
    }

    public function __invoke(): int
    {
        $stat = rand(1,50);
        return $stat;
    }
}