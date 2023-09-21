<?php

declare(strict_types=1);

namespace api\Core\General\ChapterLand\Infrastructure\Ui\Http\Controller;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\General\ChapterLand\Domain\ChapterLand; 
use api\Core\General\ChapterLand\Domain\Repository\IChapterLandRepository;
use api\Core\General\ChapterLand\Infrastructure\Persistence\ActiveRecord\ChapterLandRepositoryActiveRecord;
use api\Core\General\ChapterLand\Application\Query\GetChapterLandByIdHandler;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetChapterLandByIdController
{
    private GetChapterLandByIdHandler $handler;

    public function __construct()
    { 
        $repository = new ChapterLandRepositoryActiveRecord();
        $this->handler = new GetChapterLandByIdHandler($repository);
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

