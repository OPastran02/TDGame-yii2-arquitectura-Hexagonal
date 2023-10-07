<?php

declare(strict_types=1);

namespace api\Core\Chapter\Chapter\Domain;

use api\Shared\Domain\ValueObject\{
    NID,
    UUID,
    Available
};
use api\Core\General\Object\Domain\Objeto; 
use api\Core\General\Reward\Domain\Reward; 

final class Chapter 
{
    public function __construct(
        private NID $id,
        private UUID $idObject, 
        private NID $idReward, 
        private Available $available,
        private Objeto $objeto,
        private Reward $reward
    )
    {
    }

    public static function create( 
        NID $id,
        UUID $idObject,
        NID $idReward, 
        Available $available,
        Objeto $objeto,
        Reward $reward
    ): self 
    {
        return new self(
            $id,
            $idObject,
            $idReward,
            $available,
            $objeto,
            $reward
        );
    }

    public static function fromPrimitives(
        int $id,
        string $idObject,
        int $idReward,
        int $available,
        Objeto $objeto,
        Reward $reward
    ): self
    {
        return new Objeto(
            new NID($id),
            new NID($idObject),
            new NID($idReward),
            new Available($available),
            $objeto,
            $reward
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          isset($this->id) ? $this->id->value() : null,
            'idObject'              =>          $this->idObject->value(),
            'idReward'              =>          $this->idReward->value(),
            'available'             =>          $this->available->value(),
            'objeto'                =>          $this->objeto->toPrimitives(),
            'reward'                =>          $this->reward->toPrimitives()
        ];
    }

}