<?php

declare(strict_types=1);

namespace api\Core\General\Requirement\Infrastructure\Ui\Http\Controller;

use api\Core\General\Requirement\Domain\{
    Requirement,
    Repository\IRequirementRepository
};
use api\Core\General\Requirement\Infrastructure\Persistence\ActiveRecord\RequirementRepositoryActiveRecord;
use api\Core\General\Requirement\Application\Query\GetRequirement;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetRequirementController
{
    private GetRequirement $handler;

    public function __construct()
    { 
        $repository = new RequirementRepositoryActiveRecord();
        $this->handler = new GetRequirement($repository);
    }

    public function __invoke(int $requirementId)
    {    
        try {
            $object = ($this->handler)($requirementId);
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

