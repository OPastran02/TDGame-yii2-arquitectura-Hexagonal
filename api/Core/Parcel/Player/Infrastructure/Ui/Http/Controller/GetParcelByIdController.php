<?php

declare(strict_types=1);

namespace api\Core\Parcel\Parcel\Infrastructure\Ui\Http\Controller;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\Parcel\Parcel\Domain\Parcel; 
use api\Core\Parcel\Parcel\Domain\Repository\IParcelRepository;
use api\Core\Parcel\Parcel\Infrastructure\Persistence\ActiveRecord\ParcelRepositoryActiveRecord;
use api\Core\Parcel\Parcel\Application\Query\GetParcelByIdHandler;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetParcelyByIdController
{
    private GetParcelByIdHandler $handler;

    public function __construct()
    { 
        $repository = new ParcelRepositoryActiveRecord();
        $this->handler = new GetParcelByIdHandler($repository);
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

