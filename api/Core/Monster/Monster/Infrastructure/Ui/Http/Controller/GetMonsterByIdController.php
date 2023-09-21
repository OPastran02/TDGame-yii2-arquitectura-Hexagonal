<?php

declare(strict_types=1);

namespace api\Core\Monster\Monster\Infrastructure\Ui\Http\Controller;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\Monster\Monster\Domain\Monster; 
use api\Core\Monster\Monster\Domain\Repository\IMonsterRepository;
use api\Core\Monster\Monster\Infrastructure\Persistence\ActiveRecord\MonsterRepositoryActiveRecord;
use api\Core\Monster\Monster\Application\Query\GetMonsterByIdHandler;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetMonsteryByIdController
{
    private GetMonsterByIdHandler $handler;

    public function __construct()
    { 
        $repository = new MonsterRepositoryActiveRecord();
        $this->handler = new GetMonsterByIdHandler($repository);
    }

    public function __invoke(int $id)
    {    
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON;
    
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
    
        $response->data = $data;
        
        return $response;
    }

}  

