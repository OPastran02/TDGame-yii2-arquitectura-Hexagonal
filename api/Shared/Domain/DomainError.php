<?php

declare(strict_types=1);

namespace api\Shared\Domain;

use DomainException;

//clase abstracta que extiende de DomainException para poder generar errores en el dominio
abstract class DomainError extends DomainException
{
    public function __construct()
    {
        parent::__construct($this->errorMessage());
    }

    abstract protected function errorMessage(): string;

    abstract protected function errorCode(): string;
}