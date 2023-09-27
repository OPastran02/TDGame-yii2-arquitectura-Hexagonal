<?php

declare(strict_types=1);

namespace api\Core\Hero\Nature\Infrastructure\Ui\Http\Controller;

use api\Core\Hero\Nature\Domain\{
    Nature,
    Repository\INatureRepository
};
use api\Core\Hero\Nature\Infrastructure\Persistence\ActiveRecord\NatureRepositoryActiveRecord;
use api\Core\Hero\Nature\Application\Query\GetNatureByIdHandler;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
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

    public function __invoke(int $natureId)
    {    
        try {
            $objeto = ($this->handler)($natureId);
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

