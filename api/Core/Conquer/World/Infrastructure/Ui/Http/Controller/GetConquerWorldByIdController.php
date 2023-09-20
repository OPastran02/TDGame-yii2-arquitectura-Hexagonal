<?php

declare(strict_types=1);

namespace api\Core\Conquer\World\Infrastructure\Ui\Http\Controller;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\Conquer\World\Domain\ConquerWorld; 
use api\Core\Conquer\World\Domain\Repository\IConquerWorldRepository;
use api\Core\Conquer\World\Infrastructure\Persistence\ActiveRecord\ConquerWorldRepositoryActiveRecord;
use api\Core\Conquer\World\Application\Query\GetConquerWorldByIdHandler;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetConquerWorldByIdController
{
    private GetConquerWorldByIdHandler $handler;

    public function __construct()
    { 
        $repository = new ConquerWorldRepositoryActiveRecord();
        $this->handler = new GetConquerWorldByIdHandler($repository);
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

