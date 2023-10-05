<?php

namespace backend\modules\api\controllers;

use api\Core\Player\Wallet\Infrastructure\Ui\Http\Controller\{
    AddMoneyController,
    CreateWalletController,
    GetWalletController
};
use Yii;

class WalletController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGet($id)
    {
        return (new GetWalletController)($id);
    }

    public function actionCreate()
    {
        return (new CreateWalletController())();
    }

    public function actionAddMoney()
    {
        $data = Yii::$app->request->getBodyParams();
        return (new AddMoneyController())($data['id'],$data['name'],$data['description'],$data['color']);
    }
}
