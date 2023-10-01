<?php

declare(strict_types=1);

namespace api\Core\Player\Metric\Infrastructure\Ui\Http\Controller;

use api\Core\Player\Metric\Domain\{
    Metric,
    Repository\IMetricRepository
}; 
use api\Core\Player\Metric\Infrastructure\Persistence\ActiveRecord\MetricRepositoryActiveRecord;
use api\Core\Player\Metric\Application\Query\GetMetric;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetMetricController
{
    private GetMetric $handler;

    public function __construct()
    { 
        $repository = new MetricRepositoryActiveRecord();
        $this->handler = new GetMetric($repository);
    }

    public function __invoke(string $metricId)
    {    
        try {
            $object = ($this->handler)($metricId);
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

