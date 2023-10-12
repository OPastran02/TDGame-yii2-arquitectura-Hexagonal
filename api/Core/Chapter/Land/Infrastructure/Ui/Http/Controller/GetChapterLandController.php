<?php

declare(strict_types=1);

namespace api\Core\Chapter\Land\Infrastructure\Ui\Http\Controller;


use api\Core\Chapter\Land\Domain\{
    ChapterLand,
    Repository\IChapterLandRepository
};
use api\Core\Chapter\Land\Infrastructure\Persistence\ActiveRecord\ChapterLandRepositoryActiveRecord;
use api\Core\Chapter\Land\Application\Query\GetLand;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetChapterLandController
{
    private GetLand $handler;

    public function __construct()
    { 
        $repository = new ChapterLandRepositoryActiveRecord();
        $this->handler = new GetLand($repository);
    }

    public function __invoke(int $landId)
    {    
        try {
            $object = ($this->handler)($landId);
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
    
        Yii::$app->response->format = Response::FORMAT_JSON;
        Yii::$app->response->data = $data;
        return Yii::$app->response;
    }

}
