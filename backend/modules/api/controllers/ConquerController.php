<?php

namespace backend\modules\api\controllers;

class ConquerController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
