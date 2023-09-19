<?php

namespace backend\modules\api\controllers;

class RankedMetricController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
