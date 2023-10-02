<?php

namespace backend\modules\api\controllers;

use api\Core\General\Land\Infrastructure\Ui\Http\Controller\CreateLandController;

class LandController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate($id)
    {
        return (new CreateLandController())($id);
    }

}
