<?php

declare(strict_types=1);

namespace api\Core\Chapter\Instance\Infrastructure\Ui\Http\Controller;

use api\Core\Chapter\Instance\Domain\{
    InstanceChapter,
    InstanceChapters,
    Repository\IInstanceChapterRepository
};
use api\Core\Chapter\Instance\Infrastructure\Persistence\ActiveRecord\InstanceChapterRepositoryActiveRecord;
use api\Core\Chapter\Instance\Application\Query\GetInstanceChapterbyIdPlayer;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetInstanceChapterbyIdPlayerController
{
    private GetInstanceChapterbyIdPlayer $handler;

    public function __construct()
    { 
        $repository = new InstanceChapterRepositoryActiveRecord();
        $this->handler = new GetInstanceChapterbyIdPlayer($repository);
    }

    public function __invoke(string $playerId)
    {    
        try {
            $object = ($this->handler)($playerId);
            $status = 'ok';
            $hits = ($object !== null) ? array_map(function ($chapter) {
                return $chapter->toprimitives();
            }, $object) : ['no data'];
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

