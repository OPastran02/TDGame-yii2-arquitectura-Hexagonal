<?php

declare(strict_types=1);

namespace api\Core\Player\Status\Infrastructure\Ui\Http\Controller;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\Player\Status\Domain\Status; 
use api\Core\Player\Status\Domain\Repository\IStatusRepository;
use api\Core\Player\Status\Infrastructure\Persistence\ActiveRecord\StatusRepositoryActiveRecord;
use api\Core\Player\Status\Application\Query\GetStatusByIdHandler;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetStatusByIdController
{
    private GetStatusByIdHandler $handler;

    public function __construct()
    { 
        $repository = new StatusRepositoryActiveRecord();
        $this->handler = new GetStatusByIdHandler($repository);
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

