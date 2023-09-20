<?php

declare(strict_types=1);

namespace api\Core\General\World\Infrastructure\Ui\Http\Controller;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\General\World\Domain\World; 
use api\Core\General\World\Domain\Repository\IWorldRepository;
use api\Core\General\World\Infrastructure\Persistence\ActiveRecord\WorldRepositoryActiveRecord;
use api\Core\General\World\Application\Query\GetWorldByIdHandler;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetWorldByIdController
{
    private GetWorldByIdHandler $handler;

    public function __construct()
    { 
        $repository = new WorldRepositoryActiveRecord();
        $this->handler = new GetWorldByIdHandler($repository);
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

