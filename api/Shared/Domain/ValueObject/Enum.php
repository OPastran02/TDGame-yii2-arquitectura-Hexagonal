<?php

declare(strict_types=1);

namespace App\Shared\Domain\ValueObject;

use App\Shared\Domain\Utils;
use ReflectionClass;
use Stringable;
use function in_array;
use function Lambdish\Phunctional\each;
use function Lambdish\Phunctional\filter;
use function Lambdish\Phunctional\reindex;


abstract class Enum implements Stringable
{
    protected static array $cache = [];

    public function __construct(private string $value)
    {
        $this->ensureIsBetweenAcceptedValues($value);
    }

    abstract protected function throwExceptionForInvalidValue(mixed $value): void;

    public static function __callStatic(string $name, array $arguments): self
    {
        return new static(self::values()[$name]);
    }

    public static function fromString(string $value): self
    {
        return new static($value);
    }

    public static function values(): array
    {
        return self::cache(static function () {
            return (new ReflectionClass(static::class))->getConstants();
        });
    }

    public static function randomValue(): self
    {
        return new static(self::values()[array_rand(self::values())]);
    }

    public static function keysFormatter(): callable
    {
        return static fn (string $key): string => Utils::toCamelCase(strtolower($key));
    }

    public function value()
    {
        return $this->value;
    }

    public function equals(Enum $other): bool
    {
        return $other == $this;
    }

    public function __toString(): string
    {
        return (string) $this->value();
    }

    private function ensureIsBetweenAcceptedValues($value): void
    {
        if (!in_array($value, static::values(), true)) {
            $this->throwExceptionForInvalidValue($value);
        }
    }
}