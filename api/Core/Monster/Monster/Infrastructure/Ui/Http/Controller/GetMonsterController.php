<?php

declare(strict_types=1);

namespace api\Core\Monster\Monster\Infrastructure\Ui\Http\Controller;

use api\Core\Monster\Monster\Domain\{
    Monster,
    Repository\IMonsterRepository
};

use api\Core\Monster\Monster\Infrastructure\Persistence\ActiveRecord\MonsterRepositoryActiveRecord;
use api\Core\Monster\Monster\Application\Query\GetMonster;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetMonsterController
{
    private GetMonster $handler;

    public function __construct()
    { 
        $repository = new MonsterRepositoryActiveRecord();
        $this->handler = new GetMonster($repository);
    }

    public function __invoke(int $monsterId)
    {    
        try {
            $object = ($this->handler)($monsterId);
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

