<?php

declare(strict_types=1);

namespace api\Core\General\Stat\Application\Helpers;

class PowerLevelGenerator
{
    public function __construct()
    {
    }

    public function __invoke($arr): int
    {

        $power = ($arr["attack"] +
        $arr["defense"] +
        $arr["towerAttack"] +
        $arr["towerDefense"] +
        $arr["hp"] +
        $arr["accuracy"] +
        $arr["speed"])/7;

        $increment = ($arr["incAttack"] +
        $arr["incDefense"] +
        $arr["inchp"] +
        $arr["incTowerAttack"] +
        $arr["incTowerDefense"] +
        $arr["incAccuracy"] +
        $arr["incSpeed"])/7;


        $powerLevel = intval(round($power * (1+($increment / 100))));
        return $powerLevel;
    }
}