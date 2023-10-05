<?php

declare(strict_types=1);

namespace api\Core\Guild\Metric\Infrastructure\Ui\Http\Controller;

use api\Core\Player\Metric\Domain\{
    Metric,
    Repository\IMetricRepository
}; 
use api\Core\Guild\Metric\Infrastructure\Persistence\ActiveRecord\GuildMetricRepositoryActiveRecord;
use api\Core\Guild\Metric\Application\Query\GetGuildMetric;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetGuildMetricController
{
    private GetGuildMetric $handler;

    public function __construct()
    { 
        $repository = new GuildMetricRepositoryActiveRecord();
        $this->handler = new GetGuildMetric($repository);
    }

    public function __invoke(string $guildMetricId)
    {    
        try {
            $object = ($this->handler)($guildMetricId);
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

