<?php

declare(strict_types=1);

namespace api\Core\General\Land\Domain\ValueObject;

use api\Shared\Domain\ValueObject\Primitives\intValueObject;
use Error;

final class Order extends intValueObject
{
    protected int $value;

    public function __construct(int $value)
    {
        parent::__construct($value);
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }

}
