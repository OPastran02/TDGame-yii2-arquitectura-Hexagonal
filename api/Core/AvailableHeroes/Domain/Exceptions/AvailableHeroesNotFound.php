<?php

declare(strict_types=1);

namespace api\Core\AvailableHeroes\Domain\Exceptions;

use api\Shared\Domain\DomainError;

final class AvailableHeroesNotFound extends DomainError
{
    public function __construct (private AvailableHeroId $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'video_not_found';
    }

    protected function errorMessage(): string
    {
        return sprintf('The video <%s> has not been found', $this->id->value());
    }
}