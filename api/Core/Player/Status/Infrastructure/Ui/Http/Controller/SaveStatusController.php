<?php

declare(strict_types=1);

namespace api\Core\Player\Status\Infrastructure\Ui\Http\Controller;

use Ramsey\Uuid\Uuid;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\Player\Status\Domain\Status; 
use api\Core\Player\Status\Domain\Repository\IStatusRepository;
use api\Core\Player\Status\Infrastructure\Persistence\ActiveRecord\StatusRepositoryActiveRecord;
use api\Core\Player\Status\Application\Command\SaveStatusHandler;


class SaveStatusController
{
    private SaveStatusHandler $handler;

    public function __construct()
    { 
        $repository = new StatusRepositoryActiveRecord();
        $this->handler = new SaveStatusHandler($repository);
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
