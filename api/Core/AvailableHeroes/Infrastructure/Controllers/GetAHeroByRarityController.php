<?php

declare(strict_types=1);

namespace api\Core\AvailableHeroes\Infrastructure\Controllers;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\AvailableHeroes\Domain\AvailableHero; 
use api\Core\AvailableHeroes\Domain\Repository\IAvailableHeroRepository;
use api\Core\AvailableHeroes\Infrastructure\Persistence\ActiveRecord\AvailableHeroRepositoryActiveRecord;
use api\Core\AvailableHeroes\Application\Query\GetAHeroByRarityHandler;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetAHeroByRarityController
{
    private GetAHeroByRarityHandler $handler;

    public function __construct()
    { 
        $repository = new availableHeroRepositoryACtiveRecord();
        $this->handler = new GetAHeroByRarityHandler($repository);
    }

    public function __invoke(int $rarity)
    {    
        $heroes = ($this->handler)($rarity);
        return array_map(function ($hero) { return $hero->toPrimitives(); }, $heroes);
    }

}  
