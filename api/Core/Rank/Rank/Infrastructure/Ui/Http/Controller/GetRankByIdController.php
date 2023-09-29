<?php

declare(strict_types=1);

namespace api\Core\Rank\Rank\Infrastructure\Ui\Http\Controller;

use api\Core\Rank\Rank\Domain\{
    Rank,
    Repository\IRankRepository
};
use api\Core\Rank\Rank\Infrastructure\Persistence\ActiveRecord\RankRepositoryActiveRecord;
use api\Core\Rank\Rank\Application\Query\GetRank;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetRankByIdController
{
    private GetRank $handler;

    public function __construct()
    { 
        $repository = new RankRepositoryActiveRecord();
        $this->handler = new GetRank($repository);
    }

    public function __invoke(int $rankId)
    {    
        try {
            $objeto = ($this->handler)($rankId);
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

