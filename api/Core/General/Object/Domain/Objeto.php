<?php

declare(strict_types=1);

namespace api\Core\General\Object\Domain;

use api\Shared\Domain\ValueObject\UUID;
use api\Shared\Domain\ValueObject\NID;
use api\Shared\Domain\ValueObject\UnixTimestampDate;
use api\Shared\Domain\ValueObject\Available;
use api\Shared\Domain\ValueObject\GameText;
use api\Core\General\Object\Domain\ValueObject\Color;
use api\Core\General\Object\Domain\ValueObject\Image;
use api\Core\General\Object\Domain\ValueObject\Model;


use api\Shared\Domain\Aggregate\AggregateRoot;
use DateTime;


final class Objeto extends AggregateRoot
{
    public function __construct(
        private NID $id,
        private GameText $name,
        private GameText $description,
        private Color $color,
        private Model $model,
        private Image $image,
        private Available $available,
        private UnixTimestampDate|null $createdAt,
        private UnixTimestampDate|null $updatedAt,
        private UUID|null $createdBy,
        private UUID|null $updatedBy
    )
    {
    }

    public static function create( 
        NID $id,
        GameText $name,
        GameText $description,
        Color $color,
        Model $model,
        Image $image,
        Available $available,
        ?UnixTimestampDate $createdAt,
        ?UnixTimestampDate $updatedAt,
        ?UUID $createdBy,
        ?UUID $updatedBy
    ): self 
    {
        return $obj = new Objeto(
            $id,
            $name,
            $description,
            $color,
            $model,
            $image,
            $available,
            $createdAt,
            $updatedAt,
            $createdBy,
            $updatedBy
        );
    }

    public static function fromPrimitives(
        ?int $id,
        string $name,
        string $description,
        string $color,
        string $model,
        string $image,
        int $available,
        ?int $createdAt,
        ?int $updatedAt,
        ?string $createdBy,
        ?string $updatedBy
    ): self
    {
        return new Objeto(
            isset($id) ? new NID($id):   null,
            new GameText($name),
            new GameText($description),
            new Color($color),
            new Model($model),
            new Image($image),
            new Available($available),
            isset($createdAt) ? new UnixTimestampDate($createdAt):null,
            isset($updatedAt) ? new UnixTimestampDate($updatedAt):null,
            isset($createdBy) ? new UUID($createdBy):null,
            isset($updatedBy) ? new UUID($updatedBy):null,
        );
    }

    public function toPrimitives(): array
    {
        return [
            'id'                    =>          isset($this->id) ? $this->id->value() : null,
            'name'                  =>          $this->name->value(),
            'description'           =>          $this->description->value(),
            'color'                 =>          $this->color->value(),
            'model'                =>           $this->model->value(),
            'image      '           =>          $this->image->value(),
            'available'             =>          $this->available->value(),
            'created_at'            =>          isset($createdAt) ? $this->createdAt->getTimestamp() : null,
            'updated_at'            =>          isset($updatedAt) ? $this->updatedAt->getTimestamp() : null,
            'created_by'            =>          isset($createdBy) ? $this->createdBy->value() : null,
            'updated_by'            =>          isset($updatedBy) ? $this->updatedBy->value() : null
        ];
    }
}