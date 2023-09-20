<?php

declare(strict_types=1);

namespace api\Core\General\Land\Infrastructure\Ui\Http\Controller;

use Ramsey\Uuid\Uuid;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\General\Land\Domain\Land; 
use api\Core\General\Land\Domain\Repository\ILandRepository;
use api\Core\General\Land\Infrastructure\Persistence\ActiveRecord\LandRepositoryActiveRecord;
use api\Core\General\Land\Application\Command\SaveLandHandler;


class SaveLandController
{
    private SaveLandHandler $handler;

    public function __construct()
    { 
        $repository = new LandRepositoryActiveRecord();
        $this->handler = new SaveLandHandler($repository);
    }

    public function __invoke($arr)
    {    
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON;

        $arr['id']=Uuid::uuid4()->toString();

        $obj = ($this->handler)($arr);

        $response->data = $obj->toPrimitives();
        
        return $response;
    }

}  
