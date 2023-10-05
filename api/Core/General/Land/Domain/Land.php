<?php

declare(strict_types=1);

namespace api\Core\General\Land\Domain;

use api\Shared\Domain\ValueObject\{
    UUID,
    NID,
    Available
};

use api\Core\General\Land\Domain\ValueObject\{
    GridMap,
    Height,
    Weight,
    Order,
    Chat
};
use api\Core\General\Object\Domain\Objeto; 

final class Land
{
    public function __construct(
        private UUID $id,
        private Height $height,
        private Weight $weight,
        private GridMap $gridMap,
        private Order $order,
        private UUID $idObject,
        private Chat $chat,
        private Available $available,
        private Objeto $objeto,
    )
    {}

    public static function create( 
        UUID $id,
        Height $height,
        Weight $weight,
        GridMap $gridMap,
        Order $order,
        UUID $idObject,
        Chat $chat,
        Available $available,
        Objeto $objeto,
    ): self 
    {
        return new self(
            $id,
            $height,
            $weight,
            $gridMap,
            $order,
            $idObject,
            $chat,
            $available,
            $objeto
        );
    }

    public static function fromPrimitives(
        string $id,
        int $height,
        int $weight,
        string $gridMap,
        int $order,
        string $idObject,
        string $chat,
        int $available,
        Objeto $objeto,
    ): self
    {
        return new self(
            new UUID($id),
            new Height ($height),
            new Weight ($weight),
            new GridMap ($gridMap),
            new Order ($order),
            new UUID ($idObject),
            new Chat ($chat),
            new Available ($available),
            $objeto,
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          $this->id->value(),
            'height'                =>          $this->height->value(), 
            'weight'                =>          $this->weight->value(), 
            'gridMap'               =>          $this->gridMap->value(), 
            'order'                 =>          $this->order->value(), 
            'idObject'              =>          $this->idObject->value(), 
            'chat'                  =>          $this->chat->value(), 
            'available'             =>          $this->available->value(),
            'objeto'                =>          $this->objeto->toPrimitives(),
        ];
    }

    public function id(): UUID
    {
        return $this->id;
    }
}