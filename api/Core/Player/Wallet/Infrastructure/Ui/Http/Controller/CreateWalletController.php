<?php

declare(strict_types=1);

namespace api\Core\Player\Wallet\Infrastructure\Ui\Http\Controller;

use api\Core\Player\Status\Domain\{
    Wallet,
    Repository\IWalletRepository
};
use api\Core\Player\Wallet\Infrastructure\Persistence\ActiveRecord\WalletRepositoryActiveRecord;
use api\Core\Player\Wallet\Application\Command\CreateWallet;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Ramsey\Uuid\Uuid;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class CreateWalletController
{
    private CreateWallet $handler;

    public function __construct()
    { 
        $repository = new WalletRepositoryActiveRecord();
        $this->handler = new CreateWallet($repository);
    }

    public function __invoke()
    {    
        $obj = ($this->handler)();

        Yii::$app->response->format = Response::FORMAT_JSON;
        Yii::$app->response->data = $obj->toPrimitives();
        return Yii::$app->response;
    }
}  