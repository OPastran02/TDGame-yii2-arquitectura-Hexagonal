<?php

namespace backend\modules\api\controllers;

use yii\web\Response;
use yii\helpers\Json; // Asegúrate de importar el uso de la clase Json
use Yii;

use api\Core\Player\Status\Infrastructure\Ui\Http\Controller\GetStatusByIdController;

class StatusController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGet($id)
    {
        return (new GetStatusByIdController())($id);
    }
}
