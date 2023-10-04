<?php

declare(strict_types=1);

namespace api\Core\General\Object\Infrastructure\Ui\Http\Controller;

use api\Core\General\Object\Domain\{
    Objeto,
    Repository\IObjetoRepository
};
use api\Core\General\Object\Infrastructure\Persistence\ActiveRecord\ObjetoRepositoryActiveRecord;
use api\Core\General\Object\Application\Command\CreateObjeto;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Ramsey\Uuid\Uuid;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class CreateObjetoController
{
    private CreateObjeto $handler;

    public function __construct()
    { 
        $repository = new ObjetoRepositoryActiveRecord();
        $this->handler = new CreateObjeto($repository);
    }

    public function __invoke()
    {    
        $obj = ($this->handler)();

        Yii::$app->response->format = Response::FORMAT_JSON;
        Yii::$app->response->data = $obj->toPrimitives();
        return Yii::$app->response;
    }
}  