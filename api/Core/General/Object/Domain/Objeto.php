<?php

declare(strict_types=1);

namespace api\Core\General\Object\Domain;

use api\Shared\Domain\ValueObject\NID;
use api\Shared\Domain\ValueObject\Available;
use api\Shared\Domain\ValueObject\GameText;
use api\Core\General\Object\Domain\ValueObject\Color;
use api\Core\General\Object\Domain\ValueObject\Image;
use api\Core\General\Object\Domain\ValueObject\Model;

use api\Shared\Domain\Aggregate\AggregateRoot;

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
        ];
    }
}