<?php

declare(strict_types=1);

namespace api\Core\Chapter\Instance\Infrastructure\Ui\Http\Controller;

use api\Core\Chapter\Instance\Domain\{
    InstanceChapter,
    InstanceChapters,
    Repository\IInstanceChapterRepository
};
use api\Core\Chapter\Instance\Infrastructure\Persistence\ActiveRecord\InstanceChapterRepositoryActiveRecord;
use api\Core\Chapter\Instance\Application\Query\GetInstanceChapterByChapter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetInstanceChapterByChapterController
{
    private GetInstanceChapterByChapter $handler;

    public function __construct()
    { 
        $repository = new InstanceChapterRepositoryActiveRecord();
        $this->handler = new GetInstanceChapterByChapter($repository);
    }

    public function __invoke(string $instanceId)
    {    
        try {
            $object = ($this->handler)($playerId);
            $status = 'ok';
            $hits = $object->toprimitives();
        } catch (InvalidRequestValueException $e) {
            $status = 'error';
            $hits = ['no data'];
        }
    
        $data = [
            'status' => $status,
            'hits' => $hits,
        ];
    
        Yii::$app->response->format = Response::FORMAT_JSON;
        Yii::$app->response->data = $data;
        return Yii::$app->response;
    }

}  

