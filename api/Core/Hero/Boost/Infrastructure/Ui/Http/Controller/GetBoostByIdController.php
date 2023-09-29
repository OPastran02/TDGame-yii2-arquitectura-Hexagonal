<?php

declare(strict_types=1);

namespace api\Core\Hero\Boost\Infrastructure\Ui\Http\Controller;

use api\Core\Hero\Boost\Domain\{
    Boost,
    Repository\IBoostRepository
};
use api\Core\Hero\Boost\Infrastructure\Persistence\ActiveRecord\BoostRepositoryActiveRecord;
use api\Core\Hero\Boost\Application\Query\GetBoost;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetBoostByIdController
{
    private GetBoost $handler;

    public function __construct()
    { 
        $repository = new BoostRepositoryActiveRecord();
        $this->handler = new GetBoost($repository);
    }

    public function __invoke(int $boostId)
    {    
        try {
            $object = ($this->handler)($boostId);
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
    
        Yii::$app->response->format = Response::FORMAT_JSON;
        Yii::$app->response->data = $data;
        return Yii::$app->response;
    }

}  

