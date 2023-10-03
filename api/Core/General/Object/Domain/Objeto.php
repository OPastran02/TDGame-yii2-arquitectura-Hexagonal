<?php

declare(strict_types=1);

namespace api\Core\General\Object\Domain;

use api\Shared\Domain\ValueObject\{
    UUID,
    Available,
    GameText
};
use api\Core\General\Object\Domain\ValueObject\{
    Color,
    Image,
    Model
};

final class Objeto
{
    public function __construct(
        private UUID $id,
        private GameText $name,
        private GameText $description,
        private Color $color,
        private Model $model,
        private Image $image,
        private Available $available,
    )
    {}

    public static function create( 
        UUID $id,
        GameText $name,
        GameText $description,
        Color $color,
        Model $model,
        Image $image,
        Available $available,
    ): self 
    {
        return new self(
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
            new UUID($id),
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
            'id'                    =>          $this->id->value(),
            'name'                  =>          $this->name->value(),
            'description'           =>          $this->description->value(),
            'color'                 =>          $this->color->value(),
            'model'                 =>          $this->model->value(),
            'image      '           =>          $this->image->value(),
            'available'             =>          $this->available->value(),
        ];
    }

    public function getId(): UUID
    {
        return $this->id;
    }

    public function getName(): GameText
    {
        return $this->name;
    }

    public function getDescription(): GameText
    {
        return $this->description;
    }

    public function getColor(): Color
    {
        return $this->color;
    }

    public function getModel(): Model
    {
        return $this->model;
    }

    public function getImage(): Image
    {
        return $this->image;
    }

    public function getAvailable(): Available
    {
        return $this->available;
    }
}