<?php

namespace backend\modules\api\controllers;

class WorldController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
