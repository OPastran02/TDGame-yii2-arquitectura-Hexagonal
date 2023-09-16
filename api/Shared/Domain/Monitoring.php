<?php

declare(strict_types=1);

namespace App\Shared\Domain;

//clase para monitorear los errores en el dominio
interface Monitoring
{
    public function incrementCounter(string $metric): void;
    public function incrementGauge(string $metric): void;
    public function decrementGauge(string $metric): void;
    public function setGauge(string $metric, int $value): void;
    public function observeHistogram(string $metric, float $value): void;
}