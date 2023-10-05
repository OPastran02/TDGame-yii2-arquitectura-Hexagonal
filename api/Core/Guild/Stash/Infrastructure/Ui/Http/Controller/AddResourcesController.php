<?php

declare(strict_types=1);

namespace api\Core\Guild\Stash\Infrastructure\Ui\Http\Controller;

use api\Core\Guild\Stash\Domain\{
    Wallet,
    Repository\IStatusRepository
};
use api\Core\Guild\Stash\Infrastructure\Persistence\ActiveRecord\StashRepositoryActiveRecord;
use api\Core\Guild\Stash\Application\Command\AddResources;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class AddResourcesController
{
    private AddResources $handler;

    public function __construct()
    { 
        $repository = new StashRepositoryActiveRecord();
        $this->handler = new AddResources($repository);
    }

    public function __invoke(string $statusId, string $type, int $value)
    {    
        $obj = ($this->handler)($statusId, $type, $value);

        Yii::$app->response->format = Response::FORMAT_JSON;
        Yii::$app->response->data = $obj->toPrimitives();
        return Yii::$app->response;
    }
}  