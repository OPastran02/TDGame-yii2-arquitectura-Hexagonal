<?php

declare(strict_types=1);

namespace api\Core\Conquer\Conquer\Infrastructure\Ui\Http\Controller;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\Conquer\Conquer\Domain\Conquer; 
use api\Core\Conquer\Conquer\Domain\Repository\IConquerRepository;
use api\Core\Conquer\Conquer\Infrastructure\Persistence\ActiveRecord\ConquerRepositoryActiveRecord;
use api\Core\Conquer\Conquer\Application\Query\GetConquerByIdHandler;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetConquerByIdController
{
    private GetConquerByIdHandler $handler;

    public function __construct()
    { 
        $repository = new ConquerRepositoryActiveRecord();
        $this->handler = new GetConquerByIdHandler($repository);
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

