<?php

namespace backend\modules\api\controllers;

class MonsterController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
