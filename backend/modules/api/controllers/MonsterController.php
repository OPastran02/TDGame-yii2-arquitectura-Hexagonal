<?php

namespace backend\modules\api\controllers;

use api\Core\Monster\Monster\Infrastructure\Ui\Http\Controller\GetMonsterController;

class MonsterController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGet($id)
    {
        return (new GetMonsterController())($id);
    }

}
