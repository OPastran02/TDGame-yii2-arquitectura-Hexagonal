<?php

declare(strict_types=1);

namespace api\Core\Hero\Race\Infrastructure\Ui\Http\Controller;


use api\Core\Hero\Race\Domain\{
    Race,
    Repository\IRaceRepository
};
use api\Core\Hero\Race\Infrastructure\Persistence\ActiveRecord\RaceRepositoryActiveRecord;
use api\Core\Hero\Race\Application\Query\GetRace;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetRaceByIdController
{
    private GetRace $handler;

    public function __construct()
    { 
        $repository = new RaceRepositoryActiveRecord();
        $this->handler = new GetRace($repository);
    }

    public function __invoke(int $raceId)
    {    
        try {
            $objeto = ($this->handler)($raceId);
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

        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON;
        $response->data = $data;
        return $response;
    }

}  

