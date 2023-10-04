<?php

declare(strict_types=1);

namespace api\Core\General\Land\Infrastructure\Ui\Http\Controller;


use api\Core\General\Land\Domain\{
    Land,
    Repository\ILandRepository
};
use api\Core\General\Land\Infrastructure\Persistence\ActiveRecord\LandRepositoryActiveRecord;
use api\Core\General\Object\Infrastructure\Persistence\ActiveRecord\ObjetoRepositoryActiveRecord;

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
        $ObjetoRepository = new ObjetoRepositoryActiveRecord();
        $this->handler = new CreateLand($repository, $ObjetoRepository);
    }

    public function __invoke()
    {    
        $obj = ($this->handler)();

        Yii::$app->response->format = Response::FORMAT_JSON;
        Yii::$app->response->data = $obj->toPrimitives();
        return Yii::$app->response;
    }

}  
