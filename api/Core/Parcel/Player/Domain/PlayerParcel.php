<?php

declare(strict_types=1);

namespace api\Core\Parcel\Parcel\Domain;

use api\Shared\Domain\ValueObject\NID;
use api\Shared\Domain\ValueObject\UUID;
use api\Shared\Domain\ValueObject\Available;
use api\Core\Parcel\Parcel\Domain\ValueObject\Generation;
use api\Core\Parcel\Parcel\Domain\ValueObject\MaxQuantity;
use api\Core\Shared\Domain\ValueObject\Bronze;
use api\Core\Shared\Domain\ValueObject\Silver;
use api\Core\Shared\Domain\ValueObject\Gold;
use api\Core\Shared\Domain\ValueObject\Crystal;
use api\Core\Shared\Domain\ValueObject\Experience;
use api\Core\Shared\Domain\ValueObject\Level;

use api\Shared\Domain\Aggregate\AggregateRoot;

final class Parcel extends AggregateRoot
{
    public function __construct(
        NID $id,
        NID $idObject,
        Generation $generation,
        NID $type,
        NID $rarity,
        Bronze $bronze,
        Silver $silver,
        Gold $gold,
        Crystal $crystal,
        MaxQuantity $maxQuantity,
        NID $shop,
        NID $requirements,
        Available $available,
    )  
    {
    }

    public static function create( 
        NID $id,
        NID $idObject,
        Generation $generation,
        NID $type,
        NID $rarity,
        Bronze $bronze,
        Silver $silver,
        Gold $gold,
        Crystal $crystal,
        MaxQuantity $maxQuantity,
        NID $shop,
        NID $requirements,
        Available $available,
    ): self 
    {
        return new self(
            $id,
            $idObject,
            $generation,
            $type,
            $rarity,
            $bronze,
            $silver,
            $gold,
            $crystal,
            $maxQuantity,
            $shop,
            $requirements,
            $available,
        );
    }

    public static function fromPrimitives(
        int $id,
        int $idObject,
        int $generation,
        int $type,
        int $rarity,
        int $bronze,
        int $silver,
        int $gold,
        int $crystal,
        int $maxQuantity,
        int $shop,
        int $requirements,
        int $available,
    ): self
    {
        return new Objeto(
            new NID($id),
            new NID($idObject),
            new Generation($generation),
            new NID($type),
            new NID($rarity),
            new Bronze($bronze),
            new Silver($silver),
            new Gold($gold),
            new Crystal($crystal),
            new MaxQuantity($maxQuantity),
            new NID($shop),
            new NID($requirements),
            new Available($available),
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          $this->id->value(),
            'idObject'              =>          $this->idObject->value(),
            'generation'            =>          $this->generation->value(),
            'type'                  =>          $this->type->value(),
            'rarity'                =>          $this->rarity->value(),
            'bronze'                =>          $this->bronze->value(),
            'silver'                =>          $this->silver->value(),
            'gold'                  =>          $this->gold->value(),
            'crystal'               =>          $this->crystal->value(),
            'maxQuantity'           =>          $this->maxQuantity->value(),
            'shop'                  =>          $this->shop->value(),
            'requirements'          =>          $this->requirements->value(),
            'available'             =>          $this->available->value(),
        ];
    }

}