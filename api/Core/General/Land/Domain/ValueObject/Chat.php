<?php

declare(strict_types=1);

namespace api\Core\General\Land\Domain\ValueObject;

use api\Shared\Domain\ValueObject\Primitives\StringValueObject;
use Error;

final class Chat extends StringValueObject
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
