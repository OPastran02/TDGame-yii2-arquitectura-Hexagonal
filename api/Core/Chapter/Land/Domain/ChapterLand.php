<?php

declare(strict_types=1);

namespace api\Core\Chapter\ChapterLand\Domain;

use api\Shared\Domain\ValueObject\UUID;
use api\Shared\Domain\ValueObject\NID;
use api\Shared\Domain\ValueObject\Available;
use api\Core\Chapter\Land\Domain\Repository\IChapterLandRepository;

use api\Shared\Domain\Aggregate\AggregateRoot;

final class ChapterLand extends AggregateRoot
{
    public function __construct(
        private UUID $id,
        private NID $idchapter,
        private UUID $idland,
        private Available $available,
    )
    {
    }

    public static function create( 
        UUID $id,
        NID $idchapter,
        UUID $idland,
        Available $available,
    ): self 
    {
        return new self(
            $id,
            $idchapter,
            $idland,
            $available,
        );
    }

    public static function fromPrimitives(
        $id,
        $idchapter,
        $idland,
        $available,
    ): self
    {
        return new Objeto(
            new UUID($id),
            new NID($idchapter),
            new UUID($idland),
            new Available($available),
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          $this->id->value(),
            'idchapter'             =>          $this->idchapter->value(),
            'idland'                =>          $this->idland->value(),
            'available'             =>          $this->available->value(),
        ];
    }

}