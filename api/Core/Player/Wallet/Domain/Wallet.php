<?php

declare(strict_types=1);

namespace api\Core\Player\Wallet\Domain;

use api\Shared\Domain\ValueObject\{
    UUID,
    Available
};
use api\Core\Shared\Domain\ValueObject\{
    Bronze,
    Silver,
    Gold,
    Crystal
};

final class Wallet
{
    public function __construct(
        private UUID $id,
        private Bronze $bronze,
        private Silver $silver,
        private Gold $gold,
        private Crystal $crystal,
        private Available $available,
    )
    {}

    public static function create( 
        UUID $id,
        Bronze $bronze,
        Silver $silver,
        Gold $gold,
        Crystal $crystal,
        Available $available,
    ): self 
    {
        return new self(
            $id,
            $bronze,
            $silver,
            $gold,
            $crystal,
            $available,
        );
    }

    public static function fromPrimitives(
        string $id,
        int $bronze,
        int $silver,
        int $gold,
        int $crystal,
        int $available,
    ): self
    {
        return new self(
            new UUID($id),
            new Bronze($bronze),
            new Silver($silver),
            new Gold($gold),
            new Crystal($crystal),
            new Available($available),
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          $this->id->value(),
            'bronze'                =>          $this->bronze->value(),
            'silver'                =>          $this->silver->value(),
            'gold'                  =>          $this->gold->value(),
            'crystal'               =>          $this->crystal->value(),
            'available'             =>          $this->available->value(),
            'available'             =>          $this->available->value(),
        ];
    }

    public function id(): UUID
    {
        return $this->id;
    }
}