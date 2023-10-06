<?php

declare(strict_types=1);

namespace api\Core\General\Reward\Infrastructure\Ui\Http\Controller;

use api\Core\General\Reward\Domain\{
    Reward,
    Repository\IRewardRepository
};
use api\Core\General\Reward\Infrastructure\Persistence\ActiveRecord\RewardRepositoryActiveRecord;
use api\Core\General\Reward\Application\Query\GetRewardByIdHandler;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetRewardController
{
    private GetReward $handler;

    public function __construct()
    { 
        $repository = new RewardRepositoryActiveRecord();
        $this->handler = new GetReward($repository);
    }

    public function __invoke(int $id)
    {    
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
    
        Yii::$app->response->format = Response::FORMAT_JSON;
        Yii::$app->response->data = $data;
        return Yii::$app->response;
    }

}  

