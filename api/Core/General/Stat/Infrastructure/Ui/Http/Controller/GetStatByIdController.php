<?php

declare(strict_types=1);

namespace api\Core\General\Stat\Infrastructure\Ui\Http\Controller;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\General\Stat\Domain\Stat; 
use api\Core\General\Stat\Domain\Repository\IStatRepository;
use api\Core\General\Stat\Infrastructure\Persistence\ActiveRecord\StatRepositoryActiveRecord;
use api\Core\General\Stat\Application\Query\GetStatByIdHandler;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetStatByIdController
{
    private GetStatByIdHandler $handler;

    public function __construct()
    { 
        $repository = new StatRepositoryActiveRecord();
        $this->handler = new GetStatByIdHandler($repository);
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

