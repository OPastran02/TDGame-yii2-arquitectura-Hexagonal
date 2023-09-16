<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure;

use App\Shared\Domain\RandomNumberGenerator;

final class RandomGenerator
{
    public function generate($min, $max): int
    {
        return random_int(min, max);
    }
}