<?php

declare(strict_types=1);

namespace api\Core\Guild\Title\Infrastructure\Ui\Http\Controller;

use api\Core\Guild\title\Domain\{
    GuildTitle,
    Repository\IGuildTitleRepository
};
use api\Core\Guild\Title\Infrastructure\Persistence\ActiveRecord\GuildTitleRepositoryActiveRecord;
use api\Core\Guild\Title\Application\Query\GetGuildTitle;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetGuildTitleController
{
    private GetGuildTitle $handler;

    public function __construct()
    { 
        $repository = new GuildTitleRepositoryActiveRecord();
        $this->handler = new GetGuildTitle($repository);
    }

    public function __invoke(int $id)
    {    
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
    
        Yii::$app->response->format = Response::FORMAT_JSON;
        Yii::$app->response->data = $data;
        return Yii::$app->response;
    }

}  

