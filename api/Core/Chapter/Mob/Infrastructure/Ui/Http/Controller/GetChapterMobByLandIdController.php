<?php

declare(strict_types=1);

namespace api\Core\Chapter\Mob\Infrastructure\Ui\Http\Controller;


use api\Core\Chapter\Mob\Domain\{
    ChapterMob,
    Repository\IChapterMobRepository
};
use api\Core\Chapter\Mob\Infrastructure\Persistence\ActiveRecord\ChapterMobRepositoryActiveRecord;
use api\Core\Chapter\Mob\Application\Query\GetMobsByIdLand;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetChapterMobByLandIdController
{
    private GetMobsByIdLand $handler;

    public function __construct()
    { 
        $repository = new ChapterMobRepositoryActiveRecord();
        $this->handler = new GetMobsByIdLand($repository);
    }

    public function __invoke(string $mobId)
    {    
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON;
    
        try {
            $object = ($this->handler)($mobId);
            $status = 'ok';
            $hits = ($object !== null) ? array_map(function ($mob) {
                return $mob->toprimitives();
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

