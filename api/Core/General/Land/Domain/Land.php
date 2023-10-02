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

final class Land
{
    public function __construct(
        private UUID $id,
        private Height $height,
        private Weight $weight,
        private GridMap $gridMap,
        private Order $order,
        private NID $idObject,
        private Chat $chat,
        private Available $available,
    )
    {}

    public static function create( 
        UUID $id,
        Height $height,
        Weight $weight,
        GridMap $gridMap,
        Order $order,
        NID $idObject,
        Chat $chat,
        Available $available,
    ): self 
    {
        return $obj = new Objeto(
            $id,
            $height,
            $weight,
            $gridMap,
            $order,
            $idObject,
            $chat,
            $available,
        );
    }

    public static function fromPrimitives(
        string $id,
        int $height,
        int $weight,
        int $gridMap,
        int $order,
        int $idObject,
        string $chat,
        int $available,
    ): self
    {
        return new Stat(
            new UUID($id),
            new Height ($height),
            new Weight ($weight),
            new GridMap ($gridMap),
            new Order ($order),
            new NID ($idObject),
            new Chat ($chat),
            new Available ($available),
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
        ];
    }
}