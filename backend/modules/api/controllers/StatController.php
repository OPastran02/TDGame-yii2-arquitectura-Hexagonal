<?php

namespace backend\modules\api\controllers;

use api\Core\General\Stat\Infrastructure\Ui\Http\Controller\GetStatByIdController;
use api\Core\General\Stat\Infrastructure\Ui\Http\Controller\SaveStatController;
use Ramsey\Uuid\Uuid;
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

    public function actionGet($id)
    {
        return (new GetStatByIdController())($id);
    }

    public function actionSave()
    {
        $id=Uuid::uuid4()->toString();
        $rarity=1;
        Yii::$app->response->format = Response::FORMAT_JSON;
        $data = Yii::$app->request->getBodyParams(); 
        $value = (new SaveStatController())($id,$rarity);

        return $value;
    }


}
