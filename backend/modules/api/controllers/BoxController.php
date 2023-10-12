<?php

namespace backend\modules\api\controllers;
use api\Core\Box\Box\Infrastructure\Ui\Http\Controller\GetBoxController;
class BoxController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGet($id)
    {
        return (new GetBoxController())($id);
    }

}
