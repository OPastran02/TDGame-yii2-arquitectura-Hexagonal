<?php

namespace backend\modules\api\controllers;

class LandController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
