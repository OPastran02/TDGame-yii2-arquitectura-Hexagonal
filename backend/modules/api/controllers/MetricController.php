<?php

namespace backend\modules\api\controllers;

use api\Core\Player\Metric\Infrastructure\Ui\Http\Controller\{
    GetMetricController,
    CreateMetricController,
    UpdateMetricController
};
use Yii;

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

    public function actionCreate()
    {
        return (new CreateMetricController())();
    }

    public function actionUpdate()
    {
        $data = Yii::$app->request->getBodyParams();
        return (new UpdateMetricController())(
            $data['id'],
            $data['win'],
            $data['timePlayed'],
            $data['maxPoints'],
            $data['damageDealt'],
            $data['landsDestroyed'],
            $data['mobskilled'],
        );
    }
}
