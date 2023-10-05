<?php

declare(strict_types=1);

namespace api\Core\Guild\Metric\Infrastructure\Ui\Http\Controller;

use api\Core\Player\Metric\Domain\{
    Metric,
    Repository\IMetricRepository
}; 
use api\Core\Guild\Metric\Infrastructure\Persistence\ActiveRecord\GuildMetricRepositoryActiveRecord;
use api\Core\Guild\Metric\Application\Command\CreateMetric;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class CreateGuildMetricController
{
    private CreateMetric $handler;

    public function __construct()
    { 
        $repository = new GuildMetricRepositoryActiveRecord();
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

