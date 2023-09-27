<?php

declare(strict_types=1);

namespace api\Core\Player\Wallet\Infrastructure\Ui\Http\Controller;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\Player\Wallet\Domain\Wallet; 
use api\Core\Player\Wallet\Domain\Repository\IWalletRepository;
use api\Core\Player\Wallet\Infrastructure\Persistence\ActiveRecord\WalletRepositoryActiveRecord;
use api\Core\Player\Wallet\Application\Query\GetWalletByIdHandler;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetWalletByIdController
{
    private GetWalletByIdHandler $handler;

    public function __construct()
    { 
        $repository = new WalletRepositoryActiveRecord();
        $this->handler = new GetWalletByIdHandler($repository);
    }

    public function __invoke(string $id)
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

