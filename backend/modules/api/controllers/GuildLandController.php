<?php

namespace backend\modules\api\controllers;

class GuildLandController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
