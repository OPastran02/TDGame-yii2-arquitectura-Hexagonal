<?php

declare(strict_types=1);

namespace App\Shared\Domain;

interface UUIDGenerator
{
    public function generate(): string;
}