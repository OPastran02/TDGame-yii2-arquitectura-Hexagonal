<?php

namespace backend\modules\api\controllers;

class MembershipController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
