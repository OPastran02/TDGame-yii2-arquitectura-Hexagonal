<?php

declare(strict_types=1);

namespace api\Core\Guild\Stash\Domain;

use api\Shared\Domain\ValueObject\UUID;
use api\Shared\Domain\ValueObject\Available;
use api\Core\Shared\Domain\ValueObject\Wood;
use api\Core\Shared\Domain\ValueObject\Steel;
use api\Core\Shared\Domain\ValueObject\Farm;
use api\Core\Guild\Stash\Domain\Repository\IStashRepository;

use api\Shared\Domain\Aggregate\AggregateRoot;

final class Stash extends AggregateRoot
{
    public function __construct(
        private ?UUID $id,
        private Wood $wood, 
        private Steel $steel, 
        private Farm $farm, 
        private Available $available,
    )
    {
    }

    public static function create( 
        ?UUID $id,
        Wood $wood, 
        Steel $steel, 
        Farm $farm, 
        Available $available
    ): self 
    {
        return new self(
            $id,
            $wood, 
            $steel, 
            $farm, 
            $available
        );
    }

    public static function fromPrimitives(
        ?int $id,
        int $wood, 
        int $steel, 
        int $farm, 
        int $available
    ): self
    {
        return new Objeto(
            isset($id) ? new UUID($id):   null,
            new Wood($wood), 
            new Steel($steel), 
            new Farm($farm), 
            new Available($available),
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          isset($this->id) ? $this->id->value() : null,
            'wood'                  =>          $this->wood->value(), 
            'steel'                 =>          $this->steel->value(), 
            'farm'                  =>          $this->farm->value(), 
            'available'             =>          $this->available->value(),
        ];
    }

}