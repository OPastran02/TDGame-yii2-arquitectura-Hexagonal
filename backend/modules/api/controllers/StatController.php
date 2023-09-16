<?php

namespace backend\modules\api\controllers;

use api\Core\General\Stat\Infrastructure\Ui\Http\Controller\GetStatByIdController;
use api\Core\General\Stat\Infrastructure\Ui\Http\Controller\SaveStatController;

use yii\web\Response;
use yii\helpers\Json;
use Yii;

class StatController extends \yii\web\Controller
{

    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGetStat($id)
    {
        return (new GetStatByIdController())($id);
    }

    public function actionSaveStat()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $data = Yii::$app->request->getBodyParams(); 
        $id = (new SaveStatController())($data);

        return $id;
    }


}
