<?php

declare(strict_types=1);

namespace api\Core\Conquer\Mob\Infrastructure\Ui\Http\Controller;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\Conquer\Mob\Domain\ConquerMob; 
use api\Core\Conquer\Mob\Domain\Repository\IConquerMobRepository;
use api\Core\Conquer\Mob\Infrastructure\Persistence\ActiveRecord\ConquerMobRepositoryActiveRecord;
use api\Core\Conquer\Mob\Application\Query\GetConquerMobByIdHandler;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetConquerMobByIdController
{
    private GetConquerMobByIdHandler $handler;

    public function __construct()
    { 
        $repository = new ConquerMobRepositoryActiveRecord();
        $this->handler = new GetConquerMobByIdHandler($repository);
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

