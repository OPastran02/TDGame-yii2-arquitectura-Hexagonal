<?php

declare(strict_types=1);

namespace App\Shared\Domain;

//clase que genera un log para poder ver los errores en el dominio
interface Logger
{
    public function info(string $message, array $context = []): void;

    public function warning(string $message, array $context = []): void;

    public function critical(string $message, array $context = []): void;
}