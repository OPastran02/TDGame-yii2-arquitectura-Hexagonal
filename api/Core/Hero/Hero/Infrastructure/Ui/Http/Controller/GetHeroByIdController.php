<?php

declare(strict_types=1);

namespace api\Core\Hero\Hero\Infrastructure\Ui\Http\Controller;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\Hero\Hero\Domain\Hero; 
use api\Core\Hero\Hero\Domain\Repository\IHeroRepository;
use api\Core\Hero\Hero\Infrastructure\Persistence\ActiveRecord\HeroRepositoryActiveRecord;
use api\Core\Hero\Hero\Application\Query\GetHeroByIdHandler;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetHeroyByIdController
{
    private GetHeroByIdHandler $handler;

    public function __construct()
    { 
        $repository = new HeroRepositoryActiveRecord();
        $this->handler = new GetHeroByIdHandler($repository);
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

