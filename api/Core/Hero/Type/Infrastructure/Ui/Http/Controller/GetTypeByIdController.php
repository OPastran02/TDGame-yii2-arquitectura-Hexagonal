<?php

declare(strict_types=1);

namespace api\Core\Hero\Type\Infrastructure\Ui\Http\Controller;

use api\Core\Hero\Type\Domain\{
    Type,
    Repository\ITypeRepository
};
use api\Core\Hero\Type\Infrastructure\Persistence\ActiveRecord\TypeRepositoryActiveRecord;
use api\Core\Hero\Type\Application\Query\GetTypeByIdHandler;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetTypeByIdController
{
    private GetTypeByIdHandler $handler;

    public function __construct()
    { 
        $repository = new TypeRepositoryActiveRecord();
        $this->handler = new GetTypeByIdHandler($repository);
    }

    public function __invoke(int $typeId)
    {    
        try {
            $objeto = ($this->handler)($typeId);
            $status = 'ok';
            $hits = ($objeto !== null) ? [$objeto->toPrimitives()] : ['no data'];
        } catch (InvalidRequestValueException $e) {
            $status = 'error';
            $hits = ['no data'];
        }
    
        $data = [
            'status' => $status,
            'hits' => $hits,
        ];
    
        Yii::$app->response->format = Response::FORMAT_JSON;
        Yii::$app->response->data = $data;
        return Yii::$app->response;
    }

}  

