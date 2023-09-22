<?php

declare(strict_types=1);

namespace api\Core\General\Shop\Infrastructure\Ui\Http\Controller;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\General\Shop\Domain\Shop; 
use api\Core\General\Shop\Domain\Repository\IShopRepository;
use api\Core\General\Shop\Infrastructure\Persistence\ActiveRecord\ShopRepositoryActiveRecord;
use api\Core\General\Shop\Application\Query\GetShopByIdHandler;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetShopByIdController
{
    private GetShopByIdHandler $handler;

    public function __construct()
    { 
        $repository = new ShopRepositoryActiveRecord();
        $this->handler = new GetShopByIdHandler($repository);
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

