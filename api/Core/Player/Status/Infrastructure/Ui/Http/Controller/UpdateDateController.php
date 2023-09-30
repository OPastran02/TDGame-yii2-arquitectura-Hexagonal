<?php

declare(strict_types=1);

namespace api\Core\Player\Status\Infrastructure\Ui\Http\Controller;

use api\Core\Player\Status\Domain\{
    Status,
    Repository\IStatusRepository
};
use api\Core\Player\Status\Infrastructure\Persistence\ActiveRecord\StatusRepositoryActiveRecord;
use api\Core\Player\Status\Application\Command\UpdateDate;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Ramsey\Uuid\Uuid;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class UpdateDateController
{
    private UpdateDate $handler;

    public function __construct()
    { 
        $repository = new StatusRepositoryActiveRecord();
        $this->handler = new UpdateDate($repository);
    }

    public function __invoke(string $statusId)
    {    
        $obj = ($this->handler)($statusId);

        Yii::$app->response->format = Response::FORMAT_JSON;
        Yii::$app->response->data = $obj->toPrimitives();
        return Yii::$app->response;
    }
}  