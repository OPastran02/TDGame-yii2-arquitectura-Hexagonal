<?php

declare(strict_types=1);

namespace api\Core\Monster\Monster\Domain;

use api\Shared\Domain\ValueObject\NID;
use api\Shared\Domain\ValueObject\UUID;
use api\Shared\Domain\ValueObject\Available;
use api\Core\Box\Box\Domain\ValueObject\Booster;
use api\Core\Shared\Domain\ValueObject\Bronze;
use api\Core\Shared\Domain\ValueObject\Silver;
use api\Core\Shared\Domain\ValueObject\Gold;
use api\Core\Shared\Domain\ValueObject\Crystal;


use api\Shared\Domain\Aggregate\AggregateRoot;

final class Monster extends AggregateRoot
{
    public function __construct(
        NID $id,
        NID $idObject,
        Booster $booster,
        Bronze $bronze,
        Silver $silver,
        Gold $gold,
        Crystal $crystal,
        NID $idRequirements,
        NID $idRace,
        Available $available,
    )  
    {
    }

    public static function create( 
        NID $id,
        NID $idObject,
        Booster $booster,
        Bronze $bronze,
        Silver $silver,
        Gold $gold,
        Crystal $crystal,
        NID $idRequirements,
        NID $idRace,
        Available $available,
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
        );
    }

    public static function fromPrimitives(
        int $id,
        int $idObject,
        string $booster,
        int $bronze,
        int $silver,
        int $gold,
        int $crystal,
        int $idRequirements,
        int $idRace,
        int $available,
    ): self
    {
        return new Objeto(
            new NID($id),
            new NID($idObject),
            new Booster($booster),
            new Bronze($bronze),
            new Silver($silver),
            new Gold($gold),
            new Crystal($crystal),
            new NID($idRequirements),
            new NID($idRace),
            new Available($available),
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
        ];
    }

}