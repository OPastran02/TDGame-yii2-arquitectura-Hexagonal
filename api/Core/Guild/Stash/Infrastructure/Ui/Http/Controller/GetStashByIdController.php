<?php

declare(strict_types=1);

namespace api\Core\General\Stash\Infrastructure\Ui\Http\Controller;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\General\Stash\Domain\Stash; 
use api\Core\General\Stash\Domain\Repository\IStashRepository;
use api\Core\General\Stash\Infrastructure\Persistence\ActiveRecord\StashRepositoryActiveRecord;
use api\Core\General\Stash\Application\Query\GetStashByIdHandler;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetStashByIdController
{
    private GetStashByIdHandler $handler;

    public function __construct()
    { 
        $repository = new StashRepositoryActiveRecord();
        $this->handler = new GetStashByIdHandler($repository);
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

