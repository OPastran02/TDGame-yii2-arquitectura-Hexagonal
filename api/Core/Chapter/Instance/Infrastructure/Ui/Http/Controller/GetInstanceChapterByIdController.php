<?php

declare(strict_types=1);

namespace api\Core\Chapter\Instance\Infrastructure\Ui\Http\Controller;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\Chapter\Instance\Domain\InstanceChapter; 
use api\Core\Chapter\Instance\Domain\Repository\IInstanceChapterRepository;
use api\Core\Chapter\Instance\Infrastructure\Persistence\ActiveRecord\InstanceChapterRepositoryActiveRecord;
use api\Core\Chapter\Instance\Application\Query\GetInstanceChapterByIdHandler;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetInstanceChapterByIdController
{
    private GetInstanceChapterByIdHandler $handler;

    public function __construct()
    { 
        $repository = new InstanceChapterRepositoryActiveRecord();
        $this->handler = new GetInstanceChapterByIdHandler($repository);
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

