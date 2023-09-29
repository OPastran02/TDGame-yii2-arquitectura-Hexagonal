<?php

declare(strict_types=1);

namespace api\Core\Player\Status\Infrastructure\Ui\Http\Controller;

use api\Core\Player\Status\Domain\{
    Status,
    Repository\IStatusRepository
};
use api\Core\Player\Status\Infrastructure\Persistence\ActiveRecord\StatusRepositoryActiveRecord;
use api\Core\Player\Status\Application\Query\GetStatus;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetStatusByIdController
{
    private GetStatus $handler;

    public function __construct()
    { 
        $repository = new StatusRepositoryActiveRecord();
        $this->handler = new GetStatus($repository);
    }

    public function __invoke(string $statusId)
    {    
        try {
            $object = ($this->handler)($statusId);
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

