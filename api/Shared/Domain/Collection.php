<?php

declare(strict_types=1);

namespace api\Shared\Domain;

use ArrayIterator;
use Countable;
use IteratorAggregate;

//clase abstracta que implementa Countable e IteratorAggregate para poder recorrer los elementos de la clase y contarlos
abstract class Collection implements Countable, IteratorAggregate
{
    public function __construct(protected array $items = []) 
    {
        Assert::arrayOf($this->type(), $items); 
    }

    abstract protected function type(): string; 

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->items);
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function items(): array
    {
        return $this->items;
    }
}