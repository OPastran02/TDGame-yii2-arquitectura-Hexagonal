<?php

declare(strict_types=1);

namespace api\Core\Guild\GuildMetric\Infrastructure\Ui\Http\Controller;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\Guild\GuildMetric\Domain\GuildMetric; 
use api\Core\Guild\GuildMetric\Domain\Repository\IGuildMetricRepository;
use api\Core\Guild\GuildMetric\Infrastructure\Persistence\ActiveRecord\GuildMetricRepositoryActiveRecord;
use api\Core\Guild\GuildMetric\Application\Query\GetGuildMetricByIdHandler;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetGuildMetricByIdController
{
    private GetGuildMetricByIdHandler $handler;

    public function __construct()
    { 
        $repository = new GuildMetricRepositoryActiveRecord();
        $this->handler = new GetGuildMetricByIdHandler($repository);
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

