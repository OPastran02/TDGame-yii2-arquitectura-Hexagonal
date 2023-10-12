<?php

declare(strict_types=1);

namespace api\Core\Chapter\Instance\Infrastructure\Ui\Http\Controller;

use api\Core\Chapter\Instance\Domain\{
    InstanceChapter,
    InstanceChapters,
    Repository\IInstanceChapterRepository
};
use api\Core\Chapter\Instance\Infrastructure\Persistence\ActiveRecord\InstanceChapterRepositoryActiveRecord;
use api\Core\Chapter\Instance\Application\Command\UpdateInstanceChapter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class UpdateInstanceController
{
    private UpdateInstanceChapter $handler;

    public function __construct()
    { 
        $repository = new InstanceChapterRepositoryActiveRecord();
        $this->handler = new UpdateInstanceChapter($repository);
    }

    public function __invoke($idPlayer, $idChapter, $win, $stars)
    {      
        try {
            $obj = ($this->handler)($idPlayer, $idChapter, $win, $stars);
            $status = 'ok';
            $hits = $obj->toprimitives();
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