<?php

declare(strict_types=1);

namespace api\Core\General\Reward\Infrastructure\Ui\Http\Controller;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\General\Reward\Domain\Reward; 
use api\Core\General\Reward\Domain\Repository\IRewardRepository;
use api\Core\General\Reward\Infrastructure\Persistence\ActiveRecord\RewardRepositoryActiveRecord;
use api\Core\General\Reward\Application\Query\GetRewardByIdHandler;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetRewardByIdController
{
    private GetRewardByIdHandler $handler;

    public function __construct()
    { 
        $repository = new RewardRepositoryActiveRecord();
        $this->handler = new GetRewardByIdHandler($repository);
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

