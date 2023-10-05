<?php

declare(strict_types=1);

namespace api\Core\Guild\Stash\Infrastructure\Ui\Http\Controller;

use api\Core\Guild\Stash\Domain\{
    Stash,
    Repository\IStashRepository
};
use api\Core\Guild\Stash\Infrastructure\Persistence\ActiveRecord\StashRepositoryActiveRecord;
use api\Core\Guild\Stash\Application\Command\CreateStash;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class CreateStashController
{
    private CreateStash $handler;

    public function __construct()
    { 
        $repository = new StashRepositoryActiveRecord();
        $this->handler = new CreateStash($repository);
    }

    public function __invoke()
    {    
        $obj = ($this->handler)();

        Yii::$app->response->format = Response::FORMAT_JSON;
        Yii::$app->response->data = $obj->toPrimitives();
        return Yii::$app->response;
    }
}  