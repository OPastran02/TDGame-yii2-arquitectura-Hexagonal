<?php

declare(strict_types=1);

namespace api\Core\General\Object\Infrastructure\Ui\Http\Controller;


use api\Core\General\Object\Domain\{
    Objeto,
    Repository\IObjetoRepository
};

use api\Core\General\Object\Infrastructure\Persistence\ActiveRecord\ObjetoRepositoryActiveRecord;
use api\Core\General\Object\Application\Query\GetObjetoByIdHandler;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetObjetoByIdController
{
    private GetObjetoByIdHandler $handler;

    public function __construct()
    { 
        $repository = new ObjetoRepositoryActiveRecord();
        $this->handler = new GetObjetoByIdHandler($repository);
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