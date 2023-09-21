<?php

declare(strict_types=1);

namespace api\Core\Chapter\Instance\Domain;

use api\Shared\Domain\ValueObject\UUID;
use api\Shared\Domain\ValueObject\NID;
use api\Shared\Domain\ValueObject\Available;
use api\Core\Chapter\Instance\Domain\ValueObject\AmountOfFinished;
use api\Core\Chapter\Instance\Domain\ValueObject\Finished;
use api\Core\Chapter\Instance\Domain\ValueObject\MaxStars;

use api\Shared\Domain\Aggregate\AggregateRoot;

final class InstanceChapter extends AggregateRoot
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
        return new Objeto(
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