<?php

namespace backend\modules\api\controllers;

use api\Core\general\reward\Infrastructure\Ui\Http\Controller\{
    GetRewardController
};


class RewardController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGet($id)
    {
        return (new GetRewardController)($id);
    }

}
