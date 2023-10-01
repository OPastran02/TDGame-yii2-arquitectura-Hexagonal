<?php

namespace backend\modules\api\controllers;

use api\Core\Player\Metric\Infrastructure\Ui\Http\Controller\{
    GetMetricController,
    CreateMetricController
};

class MetricController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGet($id)
    {
        return (new GetMetricController())($id);
    }

    public function actionCreate($id)
    {
        return (new CreateMetricController())($id);
    }
}
