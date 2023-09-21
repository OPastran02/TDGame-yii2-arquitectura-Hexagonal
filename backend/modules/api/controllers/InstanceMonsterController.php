<?php

namespace backend\modules\api\controllers;

class InstanceMonsterController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
