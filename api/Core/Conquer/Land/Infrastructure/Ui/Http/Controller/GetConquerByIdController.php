<?php

declare(strict_types=1);

namespace api\Core\Conquer\Land\Infrastructure\Ui\Http\Controller;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\Conquer\Land\Domain\ConquerLand; 
use api\Core\Conquer\Land\Domain\Repository\IConquerLandRepository;
use api\Core\Conquer\Land\Infrastructure\Persistence\ActiveRecord\ConquerLandRepositoryActiveRecord;
use api\Core\Conquer\Land\Application\Query\GetConquerLandByIdHandler;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetConquerLandByIdController
{
    private GetConquerLandByIdHandler $handler;

    public function __construct()
    { 
        $repository = new ConquerLandRepositoryActiveRecord();
        $this->handler = new GetConquerLandByIdHandler($repository);
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

