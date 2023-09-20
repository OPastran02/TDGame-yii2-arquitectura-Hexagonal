<?php

namespace backend\modules\api\controllers;

class ConquerWorldController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
