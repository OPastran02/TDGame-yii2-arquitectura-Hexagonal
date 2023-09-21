<?php

declare(strict_types=1);

namespace api\Core\Box\Box\Infrastructure\Ui\Http\Controller;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\Box\Box\Domain\Box; 
use api\Core\Box\Box\Domain\Repository\IBoxRepository;
use api\Core\Box\Box\Infrastructure\Persistence\ActiveRecord\BoxRepositoryActiveRecord;
use api\Core\Box\Box\Application\Query\GetBoxByIdHandler;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetBoxyByIdController
{
    private GetBoxByIdHandler $handler;

    public function __construct()
    { 
        $repository = new BoxRepositoryActiveRecord();
        $this->handler = new GetBoxByIdHandler($repository);
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

