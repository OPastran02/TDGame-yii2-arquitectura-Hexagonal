<?php

declare(strict_types=1);

namespace api\Core\Chapter\Land\Domain;

use api\Shared\Domain\ValueObject\{
    UUID,
    NID,
    Available
};
use api\Core\Chapter\Land\Domain\Repository\IChapterLandRepository;
use api\Core\General\Land\Domain\Land;

final class ChapterLand
{
    public function __construct(
        private NID $id,
        private NID $idchapter,
        private UUID $idland,
        private Available $available,
        private Land $land
    )
    {
    }

    public static function create( 
        NID $id,
        NID $idchapter,
        UUID $idland,
        Available $available,
        Land $land
    ): self 
    {
        return new self(
            $id,
            $idchapter,
            $idland,
            $available,
            $land
        );
    }

    public static function fromPrimitives(
        int $id,
        int $idchapter,
        string $idland,
        int $available,
        Land $land
    ): self
    {
        return new self(
            new NID($id),
            new NID($idchapter),
            new UUID($idland),
            new Available($available),
            $land
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          $this->id->value(),
            'idchapter'             =>          $this->idchapter->value(),
            'idland'                =>          $this->idland->value(),
            'available'             =>          $this->available->value(),
            'land'                  =>          $this->land->toPrimitives(),
        ];
    }

}