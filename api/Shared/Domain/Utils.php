<?php

declare(strict_types=1); 

namespace api\Shared\Domain;

use DateTime;
use DateTimeInterface;
use ReflectionClass;
use RuntimeException;
use function Lambdish\Phunctional\each;
use function Lambdish\Phunctional\filter;

//clase utils que contiene funciones que se pueden usar en cualquier parte del proyecto
final class Utils{

    public static function dateTimeFrom(string $date): DateTime
    {
        return new DateTime($date);
    }

    public static function stringToCamelCase(string $text): string
    {
        return lcfirst(self::toCamelCase($text));
    }

    public static function toCamelCase(string $text): string
    {
        return str_replace('_', '', ucwords($text, '_'));
    }

    public static function endsWith(string $text, string $suffix): bool
    {
        $length = strlen($text);
        if($length === 0){
            return true;
        }

        return (substr($suffix, -$length) === $text);
    }

    public static function dateToInteger(DateTimeInterface $date): int
    {
        return (int) $date->format('Ymd');
    }

    public static function integerToDate(int $date): DateTimeInterface
    {
        return self::dateTimeFrom((string) $date);
    }

    public static function dateToString(DateTimeInterface $date): string
    {
        return $date->format(DateTimeInterface::ATOM);
    }

    public static function stringToDate(string $date): DateTime
    {
        return new DateTime($date);
    }

    public static function jsonEncode(array $data): string
    {
        $encoded = json_encode($data);

        if(JSON_ERROR_NONE !== json_last_error()){
            throw new RuntimeException('Error encoding json: ' . json_last_error_msg());
        }

        return $encoded;
    }

    public static function jsonDecode(string $data): array
    {
        $decoded = json_decode($data, true);

        if(JSON_ERROR_NONE !== json_last_error()){
            throw new RuntimeException('Error decoding json: ' . json_last_error_msg());
        }

        return $decoded;
    }

    public static function dot(array $array, string $prepend = ''): array
    {
        $results = [];
        foreach ($array as $key => $value) {
            if (is_array($value) && !empty($value)) {
                $results = array_merge($results, static::dot($value, $prepend . $key . '.'));
            } else {
                $results[$prepend . $key] = $value;
            }
        }

        return $results;
    }

    public static function map(array $array, callable $fn): array
    {
        return array_map($fn, $array);
    }

    public static function extractClassName(object $class): string
    {
        $parts = new ReflectionClass($class);

        return $parts->getShortName();
    }

    public static function iterableToArray(iterable $iterable): array
    {
        return is_array($iterable) ? $iterable : iterator_to_array($iterable);
    }
}