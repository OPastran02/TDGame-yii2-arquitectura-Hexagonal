<?php

declare(strict_types=1);

namespace api\Core\General\Rarity\Infrastructure\Ui\Http\Controller;


use api\Core\General\Rarity\Domain\{
    Rarity,
    Repository\IRarityRepository
};
use api\Core\General\Rarity\Infrastructure\Persistence\ActiveRecord\RarityRepositoryActiveRecord;
use api\Core\General\Rarity\Application\Query\GetRarity;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetRarityByIdController
{
    private GetRarity $handler;

    public function __construct()
    { 
        $repository = new RarityRepositoryActiveRecord();
        $this->handler = new GetRarity($repository);
    }

    public function __invoke(int $rarityId)
    {    
        try {
            $obj = ($this->handler)($rarityId);
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

