<?php

declare(strict_types=1);

namespace api\Core\Player\Avatar\Infrastructure\Ui\Http\Controller;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\Player\Avatar\Domain\Avatar; 
use api\Core\Player\Avatar\Domain\Repository\IAvatarRepository;
use api\Core\Player\Avatar\Infrastructure\Persistence\ActiveRecord\AvatarRepositoryActiveRecord;
use api\Core\Player\Avatar\Application\Query\GetAvatarByIdHandler;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetAvatarByIdController
{
    private GetAvatarByIdHandler $handler;

    public function __construct()
    { 
        $repository = new AvatarRepositoryActiveRecord();
        $this->handler = new GetAvatarByIdHandler($repository);
    }

    public function __invoke(string $id)
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

