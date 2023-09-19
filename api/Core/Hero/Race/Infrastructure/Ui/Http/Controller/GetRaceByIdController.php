<?php

declare(strict_types=1);

namespace api\Core\Hero\Race\Infrastructure\Ui\Http\Controller;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\Hero\Race\Domain\Race; 
use api\Core\Hero\Race\Domain\Repository\IRaceRepository;
use api\Core\Hero\Race\Infrastructure\Persistence\ActiveRecord\RaceRepositoryActiveRecord;
use api\Core\Hero\Race\Application\Query\GetRaceByIdHandler;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetRaceByIdController
{
    private GetRaceByIdHandler $handler;

    public function __construct()
    { 
        $repository = new RaceRepositoryActiveRecord();
        $this->handler = new GetRaceByIdHandler($repository);
    }

    public function __invoke(int $id)
    {    
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON;
    
        try {
            $object = ($this->handler)($id);
            $status = 'ok';
            $hits = ($object !== null) ? [$object->toPrimitives()] : ['no data'];
        } catch (InvalidRequestValueException $e) {
            $status = 'error';
            $hits = ['no data'];
        }
    
        $data = [
            'status' => $status,
            'hits' => $hits,
        ];
    
        $response->data = $data;
        
        return $response;
    }

}  

