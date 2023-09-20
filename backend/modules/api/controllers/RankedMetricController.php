<?php

namespace backend\modules\api\controllers;

use yii\web\Response;
use yii\helpers\Json; // Asegúrate de importar el uso de la clase Json
use Yii;

use api\Core\Player\RankedMetric\Infrastructure\Ui\Http\Controller\GetRankedMetricByIdController;

class RankedMetricController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGet($id)
    {
        return (new GetRankedMetricByIdController())($id);
    }
}
