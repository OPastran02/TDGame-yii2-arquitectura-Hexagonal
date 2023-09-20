<?php

declare(strict_types=1);

namespace api\Core\Conquer\Instance\Infrastructure\Ui\Http\Controller;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\Conquer\Instance\Domain\InstanceConquer; 
use api\Core\Conquer\Instance\Domain\Repository\IInstanceConquerRepository;
use api\Core\Conquer\Instance\Infrastructure\Persistence\ActiveRecord\InstanceConquerRepositoryActiveRecord;
use api\Core\Conquer\Instance\Application\Query\GetInstanceConquerByIdHandler;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetInstanceConquerByIdController
{
    private GetInstanceConquerByIdHandler $handler;

    public function __construct()
    { 
        $repository = new InstanceConquerRepositoryActiveRecord();
        $this->handler = new GetInstanceConquerByIdHandler($repository);
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

