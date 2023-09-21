<?php

namespace backend\modules\api\controllers;

class BoxController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
