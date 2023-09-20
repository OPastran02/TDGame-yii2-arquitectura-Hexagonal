<?php

declare(strict_types=1);

namespace api\Core\General\Land\Infrastructure\Ui\Http\Controller;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\General\Land\Domain\Land; 
use api\Core\General\Land\Domain\Repository\ILandRepository;
use api\Core\General\Land\Infrastructure\Persistence\ActiveRecord\LandRepositoryActiveRecord;
use api\Core\General\Land\Application\Query\GetLandByIdHandler;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetLandByIdController
{
    private GetLandByIdHandler $handler;

    public function __construct()
    { 
        $repository = new LandRepositoryActiveRecord();
        $this->handler = new GetLandByIdHandler($repository);
    }

    public function __invoke(string $id)
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

