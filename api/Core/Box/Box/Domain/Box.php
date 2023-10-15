<?php

declare(strict_types=1);

namespace api\Core\Box\Box\Domain;

use api\Shared\Domain\ValueObject\{
    NID,
    UUID,
    Available
};
use api\Core\Box\Box\Domain\ValueObject\Booster;
use api\Core\Shared\Domain\ValueObject\{
    Bronze,
    Silver,
    Gold,
    Crystal
};

use api\Core\General\Object\Domain\Objeto;
use api\Core\General\Requirement\Domain\Requirement;
use api\Core\Hero\Race\Domain\Race;

final class Box
{
    public function __construct(
        private NID $id,
        private UUID $idObject,
        private Booster $idAvailableRaces,
        private Bronze $bronze,
        private Silver $silver,
        private Gold $gold,
        private Crystal $crystal,
        private NID $idRequirements,
        private NID $idRace,
        private Available $available,
        private Objeto $objeto,
        private Requirement $requirement
    )  
    {}

    public static function create( 
        NID $id,
        UUID $idObject,
        Booster $idBooster,
        Bronze $bronze,
        Silver $silver,
        Gold $gold,
        Crystal $crystal,
        NID $idRequirements,
        NID $idRace,
        Available $available,
        Objeto $objeto,
        Requirement $requirement
    ): self 
    {
        return new self(
            $id,
            $idObject,
            $booster,
            $bronze,
            $silver,
            $gold,
            $crystal,
            $idRequirements,
            $idRace,
            $available,
            $objeto,
            $requirement,
        );
    }

    public static function fromPrimitives(
        int $id,
        string $idObject,
        string $booster,
        int $bronze,
        int $silver,
        int $gold,
        int $crystal,
        int $idRequirements,
        int $idRace,
        int $available,
        Objeto $objeto,
        Requirement $requirement,
    ): self
    {
        return new self(
            new NID($id),
            new UUID($idObject),
            new Booster($booster),
            new Bronze($bronze),
            new Silver($silver),
            new Gold($gold),
            new Crystal($crystal),
            new NID($idRequirements),
            new NID($idRace),
            new Available($available),
            $objeto,
            $requirement,
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          $this->id->value(),
            'idObject'              =>          $this->idObject->value(),
            'booster'               =>          $this->booster->value(),
            'bronze'                =>          $this->bronze->value(),
            'silver'                =>          $this->silver->value(),
            'gold'                  =>          $this->gold->value(),
            'crystal'               =>          $this->crystal->value(),
            'idRequirements'        =>          $this->idRequirements->value(),
            'idRace'                =>          $this->idRace->value(),
            'available'             =>          $this->available->value(),
            'objeto'                =>          $this->objeto->toPrimitives(),
            'requirement'           =>          $this->requirement->toPrimitives()
        ];
    }

}