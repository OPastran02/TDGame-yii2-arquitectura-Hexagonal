<?php

declare(strict_types=1);

namespace api\Core\General\GuildTitle\Infrastructure\Ui\Http\Controller;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\General\GuildTitle\Domain\GuildTitle; 
use api\Core\General\GuildTitle\Domain\Repository\IGuildTitleRepository;
use api\Core\General\GuildTitle\Infrastructure\Persistence\ActiveRecord\GuildTitleRepositoryActiveRecord;
use api\Core\General\GuildTitle\Application\Query\GetGuildTitleByIdHandler;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetGuildTitleByIdController
{
    private GetGuildTitleByIdHandler $handler;

    public function __construct()
    { 
        $repository = new GuildTitleRepositoryActiveRecord();
        $this->handler = new GetGuildTitleByIdHandler($repository);
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

