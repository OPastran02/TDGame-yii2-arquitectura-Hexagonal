<?php

declare(strict_types=1);

namespace api\Core\General\Stat\Infrastructure\Ui\Http\Controller;

use api\Core\General\Stat\Domain\{
    Stat,
    Repository\IStatRepository
};
use api\Core\General\Stat\Infrastructure\Persistence\ActiveRecord\StatRepositoryActiveRecord;
use api\Core\General\Stat\Application\Query\GetStat;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetStatByIdController
{
    private GetStat $handler;

    public function __construct()
    { 
        $repository = new StatRepositoryActiveRecord();
        $this->handler = new GetStat($repository);
    }

    public function __invoke(string $statId)
    {    
        try {
            $object = ($this->handler)($statId);
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

