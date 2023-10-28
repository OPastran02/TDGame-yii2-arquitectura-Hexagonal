<?php

declare(strict_types=1);

namespace api\Core\General\Prototype\Infrastructure\Ui\Http\Controller;


use api\Core\General\Prototype\Domain\{
    Prototype,
    Repository\IPrototypeRepository
};
use api\Core\General\Prototype\Infrastructure\Persistence\ActiveRecord\PrototypeRepositoryActiveRecord;
use api\Core\General\Prototype\Application\Query\GetPrototype;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetPrototypeController
{
    private GetPrototype $handler;

    public function __construct()
    { 
        $repository = new PrototypeRepositoryActiveRecord();
        $this->handler = new GetPrototype($repository);
    }

    public function __invoke(int $rarityId)
    {    
        try {
            $obj = ($this->handler)($rarityId);
            $status = 'ok';
            $hits = ($obj !== null) ? [$obj->toPrimitives()] : ['no data'];
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

