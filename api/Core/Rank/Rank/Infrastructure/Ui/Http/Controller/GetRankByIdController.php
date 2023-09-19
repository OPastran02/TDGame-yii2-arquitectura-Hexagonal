<?php

declare(strict_types=1);

namespace api\Core\Rank\Rank\Infrastructure\Ui\Http\Controller;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\Rank\Rank\Domain\Rank; 
use api\Core\Rank\Rank\Domain\Repository\IRankRepository;
use api\Core\Rank\Rank\Infrastructure\Persistence\ActiveRecord\RankRepositoryActiveRecord;
use api\Core\Rank\Rank\Application\Query\GetRankByIdHandler;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetRankByIdController
{
    private GetRankByIdHandler $handler;

    public function __construct()
    { 
        $repository = new RankRepositoryActiveRecord();
        $this->handler = new GetRankByIdHandler($repository);
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

