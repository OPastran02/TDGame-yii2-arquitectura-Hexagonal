<?php

declare(strict_types=1);

namespace api\Core\Monster\Instance\Infrastructure\Ui\Http\Controller;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\Monster\Instance\Domain\InstanceMonster; 
use api\Core\Monster\Instance\Domain\Repository\IInstanceMonsterRepository;
use api\Core\Monster\Instance\Infrastructure\Persistence\ActiveRecord\InstanceMonsterRepositoryActiveRecord;
use api\Core\Monster\Instance\Application\Query\GetInstanceMonsterByIdHandler;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetInstanceMonsterByIdController
{
    private GetInstanceMonsterByIdHandler $handler;

    public function __construct()
    { 
        $repository = new InstanceMonsterRepositoryActiveRecord();
        $this->handler = new GetInstanceMonsterByIdHandler($repository);
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

