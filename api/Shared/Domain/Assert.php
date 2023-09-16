<?php

declare(strict_types=1);

namespace api\Shared\Domain;

use InvalidArgumentException;

//clase final llamada assert para validar que un objeto sea instancia de una clase
final class Assert
{
    public static function arrayOf(string $class, array $items): void
    {
        foreach ($items as $item) {
            self::instanceOf($class, $item);
        }
    }

    public static function instanceof(string $class, $item): void
    {
        if (!$item instanceof $class) {
            throw new InvalidArgumentException(
                sprintf('The object <%s> is not instance of <%s>', get_class($item), $class)
            );
        }
    }
}