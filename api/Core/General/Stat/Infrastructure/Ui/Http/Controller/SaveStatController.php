<?php

declare(strict_types=1);

namespace api\Core\General\Stat\Infrastructure\Ui\Http\Controller;


use Yii;
use yii\web\Response;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\Json;
use yii\filters\VerbFilter;

use api\Core\General\Stat\Domain\Stat; 
use api\Core\General\Stat\Domain\Repository\IStatRepository;
use api\Core\General\Stat\Application\Command\SaveStatHandler;
use api\Core\General\Stat\Application\Helpers\IncrementRandomizer;
use api\Core\General\Stat\Application\Helpers\PowerLevelGenerator;
use api\Core\General\Stat\Application\Helpers\StatRandomizer;
use api\Core\General\Stat\Infrastructure\Persistence\ActiveRecord\StatRepositoryActiveRecord;



class SaveStatController
{
    private SaveStatHandler $handler;

    public function __construct()
    { 
        $repository = new StatRepositoryActiveRecord();
        $incrementRandomizer = new IncrementRandomizer();
        $statsRandomizer = new StatRandomizer();
        $this->handler = new SaveStatHandler($repository,$statsRandomizer,$incrementRandomizer);
    }

    public function __invoke($id,$rarity)
    {    
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON;

        $obj = ($this->handler)($id,$rarity);

        $response->data = $obj->toPrimitives();
        
        return $response;
    }

}  
