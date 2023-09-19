<?php

declare(strict_types=1);

namespace api\Core\Player\RankedMetric\Infrastructure\Ui\Http\Controller;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\Player\RankedMetric\Domain\RankedMetric; 
use api\Core\Player\RankedMetric\Domain\Repository\IRankedMetricRepository;
use api\Core\Player\RankedMetric\Infrastructure\Persistence\ActiveRecord\RankedMetricRepositoryActiveRecord;
use api\Core\Player\RankedMetric\Application\Query\GetRankedMetricByIdHandler;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetRankedMetricByIdController
{
    private GetRankedMetricByIdHandler $handler;

    public function __construct()
    { 
        $repository = new RankedMetricRepositoryActiveRecord();
        $this->handler = new GetRankedMetricByIdHandler($repository);
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

