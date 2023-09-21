<?php

declare(strict_types=1);

namespace api\Core\General\Requirement\Infrastructure\Ui\Http\Controller;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\General\Requirement\Domain\Requirement; 
use api\Core\General\Requirement\Domain\Repository\IRequirementRepository;
use api\Core\General\Requirement\Infrastructure\Persistence\ActiveRecord\RequirementRepositoryActiveRecord;
use api\Core\General\Requirement\Application\Query\GetRequirementByIdHandler;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetRequirementByIdController
{
    private GetRequirementByIdHandler $handler;

    public function __construct()
    { 
        $repository = new RequirementRepositoryActiveRecord();
        $this->handler = new GetRequirementByIdHandler($repository);
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

