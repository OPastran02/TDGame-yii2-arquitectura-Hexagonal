<?php

namespace backend\modules\api\controllers;

class PlayerController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
