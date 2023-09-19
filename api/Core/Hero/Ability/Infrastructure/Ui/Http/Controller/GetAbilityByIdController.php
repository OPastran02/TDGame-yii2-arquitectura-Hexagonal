<?php

declare(strict_types=1);

namespace api\Core\Hero\Ability\Infrastructure\Ui\Http\Controller;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\Hero\Ability\Domain\Ability; 
use api\Core\Hero\Ability\Domain\Repository\IAbilityRepository;
use api\Core\Hero\Ability\Infrastructure\Persistence\ActiveRecord\AbilityRepositoryActiveRecord;
use api\Core\Hero\Ability\Application\Query\GetAbilityByIdHandler;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetAbilityByIdController
{
    private GetAbilityByIdHandler $handler;

    public function __construct()
    { 
        $repository = new AbilityRepositoryActiveRecord();
        $this->handler = new GetAbilityByIdHandler($repository);
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

