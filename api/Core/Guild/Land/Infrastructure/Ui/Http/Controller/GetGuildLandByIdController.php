<?php

declare(strict_types=1);

namespace api\Core\General\GuildLand\Infrastructure\Ui\Http\Controller;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\General\GuildLand\Domain\GuildLand; 
use api\Core\General\GuildLand\Domain\Repository\IGuildLandRepository;
use api\Core\General\GuildLand\Infrastructure\Persistence\ActiveRecord\GuildLandRepositoryActiveRecord;
use api\Core\General\GuildLand\Application\Query\GetGuildLandByIdHandler;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetGuildLandByIdController
{
    private GetGuildLandByIdHandler $handler;

    public function __construct()
    { 
        $repository = new GuildLandRepositoryActiveRecord();
        $this->handler = new GetGuildLandByIdHandler($repository);
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

