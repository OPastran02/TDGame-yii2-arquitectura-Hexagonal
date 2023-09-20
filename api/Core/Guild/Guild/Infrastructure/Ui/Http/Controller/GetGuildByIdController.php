<?php

declare(strict_types=1);

namespace api\Core\Guild\Guild\Infrastructure\Ui\Http\Controller;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\Guild\Guild\Domain\Guild; 
use api\Core\Guild\Guild\Domain\Repository\IGuildRepository;
use api\Core\Guild\Guild\Infrastructure\Persistence\ActiveRecord\GuildRepositoryActiveRecord;
use api\Core\Guild\Guild\Application\Query\GetGuildByIdHandler;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetGuildByIdController
{
    private GetGuildByIdHandler $handler;

    public function __construct()
    { 
        $repository = new GuildRepositoryActiveRecord();
        $this->handler = new GuildByIdHandler($repository);
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

