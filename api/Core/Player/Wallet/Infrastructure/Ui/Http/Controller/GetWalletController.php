<?php

declare(strict_types=1);

namespace api\Core\Player\Wallet\Infrastructure\Ui\Http\Controller;


use api\Core\Player\Wallet\Domain\{
    Wallet,
    Repository\IWalletRepository
};
use api\Core\Player\Wallet\Infrastructure\Persistence\ActiveRecord\WalletRepositoryActiveRecord;
use api\Core\Player\Wallet\Application\Query\GetWallet;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class GetWalletController
{
    private GetWallet $handler;

    public function __construct()
    { 
        $repository = new WalletRepositoryActiveRecord();
        $this->handler = new GetWallet($repository);
    }

    public function __invoke(string $id)
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

