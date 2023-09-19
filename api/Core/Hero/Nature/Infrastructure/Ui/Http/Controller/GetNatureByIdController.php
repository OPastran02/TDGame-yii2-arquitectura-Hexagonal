<?php

declare(strict_types=1);

namespace api\Core\Hero\Nature\Infrastructure\Ui\Http\Controller;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\Hero\Nature\Domain\Nature; 
use api\Core\Hero\Nature\Domain\Repository\INatureRepository;
use api\Core\Hero\Nature\Infrastructure\Persistence\ActiveRecord\NatureRepositoryActiveRecord;
use api\Core\Hero\Nature\Application\Query\GetNatureByIdHandler;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetNatureByIdController
{
    private GetNatureByIdHandler $handler;

    public function __construct()
    { 
        $repository = new NatureRepositoryActiveRecord();
        $this->handler = new GetNatureByIdHandler($repository);
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

