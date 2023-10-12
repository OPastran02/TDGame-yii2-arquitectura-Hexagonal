<?php

declare(strict_types=1);

namespace api\Core\Box\Box\Infrastructure\Ui\Http\Controller;

use api\Core\Box\Box\Domain\{
    Box,
    Repository\IBoxRepository
};
use api\Core\Box\Box\Infrastructure\Persistence\ActiveRecord\BoxRepositoryActiveRecord;
use api\Core\Box\Box\Application\Query\GetBox;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetBoxController
{
    private GetBox $handler;

    public function __construct()
    { 
        $repository = new BoxRepositoryActiveRecord();
        $this->handler = new GetBox($repository);
    }

    public function __invoke(int $boxId)
    {    
        try {
            $object = ($this->handler)($boxId);
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

