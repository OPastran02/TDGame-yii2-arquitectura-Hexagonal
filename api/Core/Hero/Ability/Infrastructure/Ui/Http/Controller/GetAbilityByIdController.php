<?php

declare(strict_types=1);

namespace api\Core\Hero\Ability\Infrastructure\Ui\Http\Controller;

use api\Core\Hero\Ability\Domain\{
    Ability,
    IAbilityRepository
};
use api\Core\Hero\Ability\Infrastructure\Persistence\ActiveRecord\AbilityRepositoryActiveRecord;
use api\Core\Hero\Ability\Application\Query\GetAbility;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetAbilityByIdController
{
    private GetAbility $handler;

    public function __construct()
    { 
        $repository = new AbilityRepositoryActiveRecord();
        $this->handler = new GetAbility($repository);
    }

    public function __invoke(int $abilityId)
    {    
        try {
            $objeto = ($this->handler)($abilityId);
            $status = 'ok';
            $hits = ($objeto !== null) ? [$objeto->toPrimitives()] : ['no data'];
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

