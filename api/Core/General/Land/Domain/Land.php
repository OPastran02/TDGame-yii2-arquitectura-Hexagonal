<?php

declare(strict_types=1);

namespace api\Core\General\Land\Domain;

use api\Shared\Domain\ValueObject\UUID;
use api\Shared\Domain\ValueObject\NID;
use api\Shared\Domain\ValueObject\Available;

use api\Core\General\Land\Domain\ValueObject\Code;
use api\Core\General\Land\Domain\ValueObject\Height;
use api\Core\General\Land\Domain\ValueObject\Weight;
use api\Core\General\Land\Domain\ValueObject\Order;
use api\Core\General\Land\Domain\ValueObject\Chat;

use api\Shared\Domain\Aggregate\AggregateRoot;

final class Land extends AggregateRoot
{
    public function __construct(
        private UUID|null $id,
        private Height $height,
        private Weight $weight,
        private Code $code,
        private Order $order,
        private NID $idObject,
        private Chat $chat,
        private Available $available,
    )
    {
    }

    public static function create( 
        ?UUID $id,
        Height $height,
        Weight $weight,
        Code $code,
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
            $code,
            $order,
            $idObject,
            $chat,
            $available,
        );
    }

    public static function fromPrimitives(
        ?string $id,
        int $height,
        int $weight,
        int $code,
        int $order,
        int $idObject,
        string $chat,
        int $available,
    ): self
    {
        return new Stat(
            isset($id) ? new UUID($id):   null,
            new Height ($height),
            new Weight ($weight),
            new Code ($code),
            new Order ($order),
            new NID ($idObject),
            new Chat ($chat),
            new Available ($available),
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          isset($this->id) ? $this->id->value() : null,
            'height'                =>          $this->height->value(), 
            'weight'                =>          $this->weight->value(), 
            'code'                  =>          $this->code->value(), 
            'order'                 =>          $this->order->value(), 
            'idObject'              =>          $this->idObject->value(), 
            'chat'                  =>          $this->chat->value(), 
            'available'             =>          $this->available->value(),
        ];
    }
}