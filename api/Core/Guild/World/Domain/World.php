<?php

declare(strict_types=1);

namespace api\Core\Guild\World\Domain;

use api\Shared\Domain\ValueObject\UUID;
use api\Shared\Domain\ValueObject\NID;
use api\Shared\Domain\ValueObject\Available;
use api\Core\Shared\Domain\ValueObject\Wood;
use api\Core\Shared\Domain\ValueObject\Steel;
use api\Core\Shared\Domain\ValueObject\Farm;
use api\Core\Shared\Domain\ValueObject\Order;
use api\Core\Guild\World\Domain\Repository\IWorldRepository;

use api\Shared\Domain\Aggregate\AggregateRoot;

final class World extends AggregateRoot
{
    public function __construct(
        private ?UUID $id,
        private NID $idObject, 
        private UUID $idGuild, 
        private Order $order, 
        private Available $active, 
        private Available $available,
    )
    {
    }

    public static function create( 
        ?UUID $id,
        NID $idObject, 
        UUID $idGuild, 
        Order $order, 
        Available $active, 
        Available $available
    ): self 
    {
        return new self(
            $id,
            $idObject, 
            $idGuild, 
            $order, 
            $active, 
            $available
        );
    }

    public static function fromPrimitives(
        ?int $id,
        int $idObject, 
        string $idGuild, 
        int $order, 
        int $active, 
        int $available
    ): self
    {
        return new Objeto(
            isset($id) ? new UUID($id):   null,
            new NID($idObject), 
            new UUID($idGuild), 
            new Order($order), 
            new Available($active), 
            new Available($available),
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          isset($this->id) ? $this->id->value() : null,
            'idObject'              =>          $this->idObject->value(), 
            'idGuild'               =>          $this->idGuild->value(), 
            'order'                 =>          $this->order->value(), 
            'active'                =>          $this->active->value(), 
            'available'             =>          $this->available->value(),
        ];
    }

}