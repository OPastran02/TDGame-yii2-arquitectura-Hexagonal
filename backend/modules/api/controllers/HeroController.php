<?php

namespace backend\modules\api\controllers;

class HeroController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
