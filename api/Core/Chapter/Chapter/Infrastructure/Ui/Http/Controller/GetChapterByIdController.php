<?php

declare(strict_types=1);

namespace api\Core\Chapter\Chapter\Infrastructure\Ui\Http\Controller;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\Chapter\Chapter\Domain\Chapter; 
use api\Core\Chapter\Chapter\Domain\Repository\IChapterRepository;
use api\Core\Chapter\Chapter\Infrastructure\Persistence\ActiveRecord\ChapterRepositoryActiveRecord;
use api\Core\Chapter\Chapter\Application\Query\GetChapterByIdHandler;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetChapteryByIdController
{
    private GetChapterByIdHandler $handler;

    public function __construct()
    { 
        $repository = new ChapterRepositoryActiveRecord();
        $this->handler = new GetChapterByIdHandler($repository);
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

