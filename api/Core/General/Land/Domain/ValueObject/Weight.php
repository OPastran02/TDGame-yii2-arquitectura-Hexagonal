<?php

declare(strict_types=1);

namespace api\Core\General\Land\Domain\ValueObject;

use api\Shared\Domain\ValueObject\Primitives\intValueObject;
use Error;

final class Weight extends intValueObject
{
    protected string $value;

    public function __construct(string $value)
    {
        parent::__construct($value);
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }

}
