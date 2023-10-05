<?php

declare(strict_types=1);

namespace api\Core\Guild\Stash\Infrastructure\Ui\Http\Controller;

use api\Core\Guild\Stash\Domain\{
    Stash,
    Repository\IStashRepository
};
use api\Core\Guild\Stash\Infrastructure\Persistence\ActiveRecord\StashRepositoryActiveRecord;
use api\Core\Guild\Stash\Application\Query\GetStash;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetStashController
{
    private GetStash $handler;

    public function __construct()
    { 
        $repository = new StashRepositoryActiveRecord();
        $this->handler = new GetStash($repository);
    }

    public function __invoke(string $stashId)
    {    
        try {
            $object = ($this->handler)($stashId);
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