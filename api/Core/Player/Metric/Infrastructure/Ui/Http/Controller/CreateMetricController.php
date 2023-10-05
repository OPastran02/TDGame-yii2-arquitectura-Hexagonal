<?php

declare(strict_types=1);

namespace api\Core\Player\Metric\Infrastructure\Ui\Http\Controller;

use api\Core\Player\Status\Domain\{
    Metric,
    Repository\IMetricRepository
};
use api\Core\Player\Metric\Infrastructure\Persistence\ActiveRecord\MetricRepositoryActiveRecord;
use api\Core\Player\Metric\Application\Command\CreateMetric;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class CreateMetricController
{
    private CreateMetric $handler;

    public function __construct()
    { 
        $repository = new MetricRepositoryActiveRecord();
        $this->handler = new CreateMetric($repository);
    }

    public function __invoke()
    {    
        $obj = ($this->handler)();

        Yii::$app->response->format = Response::FORMAT_JSON;
        Yii::$app->response->data = $obj->toPrimitives();
        return Yii::$app->response;
    }
}  