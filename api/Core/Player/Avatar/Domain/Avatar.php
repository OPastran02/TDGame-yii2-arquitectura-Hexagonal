<?php

declare(strict_types=1);

namespace api\Core\Player\Avatar\Domain;

use api\Shared\Domain\ValueObject\{
    NID,
    UUID,
    Available,
};
use api\Core\Player\Avatar\Domain\ValueObject\{
    Nickname,
    Message
};

use api\Core\General\Object\Domain\Objeto; 

final class Avatar
{
    public function __construct(
        private UUID $id,
        private Nickname $nickname,
        private Message $message,
        private UUID $idObject, 
        private Available $available,
        private Objeto $objeto
    )
    {
    }

    public static function create( 
        UUID $id,
        Nickname $nickname,
        Message $message,
        UUID $idObject, 
        Available $available,
        Objeto $objeto,
    ): self 
    {
        return new self(
            $id,
            $nickname,
            $message,
            $idObject, 
            $available,
            $objeto,
        );
    }

    public static function fromPrimitives(
        string $id,
        string $nickname,
        string $message,
        string $idObject, 
        int $available,
        Objeto $objeto,
    ): self
    {
        return new self(
            new UUID($id),
            new Nickname($nickname),
            new Message($message),
            new UUID ($idObject), 
            new Available ($available),
            $objeto,
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          $this->id->value(),
            'nickname'              =>          $this->nickname->value(),
            'message'               =>          $this->message->value(),
            'idObject'              =>          $this->idObject->value(),
            'available'             =>          $this->available->value(),
            'objeto'                =>          $this->objeto->toPrimitives(),
        ];
    }
}