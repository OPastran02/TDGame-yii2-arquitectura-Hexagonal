<?php

declare(strict_types=1);

namespace api\Core\Player\Avatar\Infrastructure\Ui\Http\Controller;


use api\Core\Player\Avatar\Domain\{
    Avatar,
    Repository\IAvatarRepository
}; 
use api\Core\Player\Avatar\Infrastructure\Persistence\ActiveRecord\AvatarRepositoryActiveRecord;
use api\Core\Player\Avatar\Application\Query\GetAvatar;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetAvatarController
{
    private GetAvatar $handler;

    public function __construct()
    { 
        $repository = new AvatarRepositoryActiveRecord();
        $this->handler = new GetAvatar($repository);
    }

    public function __invoke(string $avatarId)
    {    
        try {
            $object = ($this->handler)($avatarId);
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

