<?php

declare(strict_types=1);

namespace api\Core\Player\Metric\Infrastructure\Ui\Http\Controller;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\Player\Metric\Domain\Metric; 
use api\Core\Player\Metric\Domain\Repository\IMetricRepository;
use api\Core\Player\Metric\Infrastructure\Persistence\ActiveRecord\MetricRepositoryActiveRecord;
use api\Core\Player\Metric\Application\Query\GetMetricByIdHandler;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetMetricByIdController
{
    private GetMetricByIdHandler $handler;

    public function __construct()
    { 
        $repository = new MetricRepositoryActiveRecord();
        $this->handler = new GetMetricByIdHandler($repository);
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

