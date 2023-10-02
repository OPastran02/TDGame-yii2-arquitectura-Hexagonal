<?php

declare(strict_types=1);

namespace api\Core\Player\Status\Application\Helpers;

class EmptyGridCreator
{

    private int $width;
    private int $height;

    public function __construct(int $width,int $height)
    {
        $this->width=$width;
        $this->height=$height;
    }

    public function __invoke(): string
    {
        $emptyGrid = ["grid" => []];

        for ($i = 0; $i < $height; $i++) {
            $row = array_fill(0, $width, 0);
            $emptyGrid["grid"][] = $row;
        }

        $emptyGridJSON = json_encode($emptyGrid, JSON_PRETTY_PRINT);
        
        return $emptyGridJSON;
    }
}