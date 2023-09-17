<?php

declare(strict_types=1);

namespace api\Core\General\Object\Infrastructure\Ui\Http\Controller;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\General\Rarity\Domain\Rarity; 
use api\Core\General\Rarity\Domain\Repository\IRarityRepository;
use api\Core\General\Rarity\Infrastructure\Persistence\ActiveRecord\RarityRepositoryActiveRecord;
use api\Core\General\Object\Application\Query\GetRarityByIdHandler;
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

