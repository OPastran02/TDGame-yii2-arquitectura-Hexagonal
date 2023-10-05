<?php

declare(strict_types=1);

namespace api\Core\Guild\Stash\Domain;

use api\Shared\Domain\ValueObject\{
    UUID,
    Available
};
use api\Core\Shared\Domain\ValueObject\{
    Wood,
    Steel,
    Farm
};

final class Stash 
{
    public function __construct(
        private UUID $id,
        private Wood $wood, 
        private Steel $steel, 
        private Farm $farm, 
        private Available $available,
    )
    {
    }

    public static function create( 
        UUID $id,
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
        string $id,
        int $wood, 
        int $steel, 
        int $farm, 
        int $available
    ): self
    {
        return new self(
            new UUID($id),
            new Wood($wood), 
            new Steel($steel), 
            new Farm($farm), 
            new Available($available),
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          $this->id->value(),
            'wood'                  =>          $this->wood->value(), 
            'steel'                 =>          $this->steel->value(), 
            'farm'                  =>          $this->farm->value(), 
            'available'             =>          $this->available->value(),
        ];
    }

}