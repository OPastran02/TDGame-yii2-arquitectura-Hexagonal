<?php

declare(strict_types=1);

namespace api\Core\Chapter\Mob\Infrastructure\Ui\Http\Controller;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\Chapter\Mob\Domain\ChapterMob; 
use api\Core\Chapter\Mob\Domain\Repository\IChapterMobRepository;
use api\Core\Chapter\Mob\Infrastructure\Persistence\ActiveRecord\ChapterMobRepositoryActiveRecord;
use api\Core\Chapter\Mob\Application\Query\GetChapterMobByIdHandler;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetChapterMobByIdController
{
    private GetChapterMobByIdHandler $handler;

    public function __construct()
    { 
        $repository = new ChapterMobRepositoryActiveRecord();
        $this->handler = new GetChapterMobByIdHandler($repository);
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

