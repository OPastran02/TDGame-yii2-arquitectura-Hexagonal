<?php

declare(strict_types=1);

namespace api\Core\General\Object\Infrastructure\Ui\Http\Controller;


use api\Core\General\Object\Domain\{
    Objeto,
    Repository\IObjetoRepository
};

use api\Core\General\Object\Infrastructure\Persistence\ActiveRecord\ObjetoRepositoryActiveRecord;
use api\Core\General\Object\Application\Query\GetObjeto;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetObjetoByIdController
{
    private GetObjeto $handler;

    public function __construct()
    { 
        $repository = new ObjetoRepositoryActiveRecord();
        $this->handler = new GetObjeto($repository);
    }

    public function __invoke(string $objetoId)
    {        
        try {
            $objeto = ($this->handler)($objetoId);
            var_dump($objeto);
            exit();
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