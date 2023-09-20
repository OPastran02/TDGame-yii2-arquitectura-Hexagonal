<?php

declare(strict_types=1);

namespace api\Core\Guild\GuildLand\Domain;

use api\Shared\Domain\ValueObject\UUID;
use api\Shared\Domain\ValueObject\Available;
use api\Core\Shared\Domain\ValueObject\Wood;
use api\Core\Shared\Domain\ValueObject\Steel;
use api\Core\Shared\Domain\ValueObject\Farm;
use api\Core\Guild\GuildLand\Domain\Repository\IGuildLandRepository;

use api\Shared\Domain\Aggregate\AggregateRoot;

final class GuildLand extends AggregateRoot
{
    public function __construct(
        private ?UUID $id,
        private NID $idMembership,
        private NID $idWorld,
        private UUID $idland,
        private Available $available,
    )
    {
    }

    public static function create( 
        ?UUID $id,
        NID $idMembership,
        NID $idWorld,
        UUID $idland,
        Available $available
    ): self 
    {
        return new self(
            $id,
            $idMembership,
            $idWorld,
            $idland,
            $available
        );
    }

    public static function fromPrimitives(
        ?int $id,
        int $idMembership,
        int $idWorld,
        string $idland,
        int $available
    ): self
    {
        return new Objeto(
            isset($id) ? new UUID($id):   null,
            new NID($idMembership),
            new NID($idWorld),
            new UUID($idland), 
            new Available($available),
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          isset($this->id) ? $this->id->value() : null,
            'idMembership'          =>          $this->idMembership->value(),
            'idWorld'               =>          $this->idWorld->value(),
            'idland'                =>          $this->idland->value(), 
            'available'             =>          $this->available->value(),
        ];
    }

}