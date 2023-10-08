<?php

declare(strict_types=1);

namespace api\Core\Chapter\Instance\Domain;

use api\Shared\Domain\ValueObject\{
    UUID,
    NID,
    Available
};
use api\Core\Chapter\Instance\Domain\ValueObject\{
    AmountOfFinished,
    Finished,
    MaxStars
};

final class InstanceChapter 
{
    public function __construct(
        private NID $id,
        private UUID $idPlayer,
        private NID $idChapter, 
        private Finished $finished, 
        private AmountOfFinished $amountOfFinished, 
        private MaxStars $maxStars, 
        private Available $available,
    )
    {
    }

    public static function create( 
        NID $id,
        UUID $idPlayer,
        NID $idChapter, 
        Finished $finished, 
        AmountOfFinished $amountOfFinished, 
        MaxStars $maxStars, 
        Available $available,
    ): self 
    {
        return new self(
            $id,
            $idPlayer,
            $idChapter, 
            $finished, 
            $amountOfFinished, 
            $maxStars, 
            $available,
        );
    }

    public static function fromPrimitives(
        int $id,
        string $idPlayer,
        int $idChapter, 
        int $finished, 
        int $amountOfFinished, 
        int $maxStars, 
        int $available,
    ): self
    {
        return new self(
            new NID($id),
            new UUID($idPlayer),
            new NID($idChapter), 
            new Finished($finished), 
            new AmountOfFinished($amountOfFinished), 
            new MaxStars($maxStars), 
            new Available($available),
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          $this->id->value(),
            'idPlayer'              =>          $this->idPlayer->value(),
            'idChapter'             =>          $this->idChapter->value(), 
            'finished'              =>          $this->finished->value(), 
            'amountOfFinished'      =>          $this->amountOfFinished->value(), 
            'maxStars'              =>          $this->maxStars->value(), 
            'available'             =>          $this->available->value(),
        ];
    }

}