<?php

namespace backend\modules\api\controllers;

class StashController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
