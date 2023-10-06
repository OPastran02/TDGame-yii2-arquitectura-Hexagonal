<?php

declare(strict_types=1);

namespace api\Core\Guild\Guild\Infrastructure\Ui\Http\Controller;

use api\Core\Guild\Guild\Domain\{
    Guild,
    Repository\IGuildRepository
};
use api\Core\Guild\Guild\Infrastructure\Persistence\ActiveRecord\GuildRepositoryActiveRecord;
use api\Core\Guild\Guild\Application\Query\GetGuild;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetGuildController
{
    private GetGuild $handler;

    public function __construct()
    { 
        $repository = new GuildRepositoryActiveRecord();
        $this->handler = new GetGuild($repository);
    }

    public function __invoke(string $guildId)
    {    
        try {
            $object = ($this->handler)($guildId);
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

