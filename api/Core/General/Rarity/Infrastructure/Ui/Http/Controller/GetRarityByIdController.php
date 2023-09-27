<?php

declare(strict_types=1);

namespace api\Core\General\Rarity\Infrastructure\Ui\Http\Controller;


use api\Core\General\Rarity\Domain\{
    Rarity,
    Repository\IRarityRepository
};
use api\Core\General\Rarity\Infrastructure\Persistence\ActiveRecord\RarityRepositoryActiveRecord;
use api\Core\General\Rarity\Application\Query\GetRarityByIdHandler;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetRarityByIdController
{
    private GetRarityByIdHandler $handler;

    public function __construct()
    { 
        $repository = new RarityRepositoryActiveRecord();
        $this->handler = new GetRarityByIdHandler($repository);
    }

    public function __invoke(int $id)
    {    
        try {
            $obj = ($this->handler)($id);
            $status = 'ok';
            $hits = ($obj !== null) ? [$obj->toPrimitives()] : ['no data'];
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

