<?php

declare(strict_types=1);

namespace api\Core\General\Land\Infrastructure\Ui\Http\Controller;


use api\Core\General\Land\Domain\{
    Land,
    Repository\ILandRepository
};
use api\Core\General\Land\Infrastructure\Persistence\ActiveRecord\LandRepositoryActiveRecord;
use api\Core\General\Land\Application\Command\CreateLand;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class CreateLandController
{
    private CreateLand $handler;

    public function __construct()
    { 
        $repository = new LandRepositoryActiveRecord();
        $this->handler = new CreateLand($repository);
    }

    public function __invoke(string $landId)
    {    
        $obj = ($this->handler)($landId);

        Yii::$app->response->format = Response::FORMAT_JSON;
        Yii::$app->response->data = $obj->toPrimitives();
        return Yii::$app->response;
    }

}  
