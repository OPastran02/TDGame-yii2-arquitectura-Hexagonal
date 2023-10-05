<?php

declare(strict_types=1);

namespace api\Core\Player\Player\Infrastructure\Ui\Http\Controller;


use api\Core\Player\Player\Domain\{
    Player,
    Repository\IPlayerRepository
}; 
use api\Core\Player\Player\Infrastructure\Persistence\ActiveRecord\PlayerRepositoryActiveRecord;
use api\Core\Player\Player\Application\Query\GetPlayer;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetPlayerController
{
    private GetPlayer $handler;

    public function __construct()
    { 
        $repository = new PlayerRepositoryActiveRecord();
        $this->handler = new GetPlayer($repository);
    }

    public function __invoke(string $playerId)
    {    
        try {
            $object = ($this->handler)($playerId);
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

