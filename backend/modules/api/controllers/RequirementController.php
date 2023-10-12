<?php

namespace backend\modules\api\controllers;

use api\Core\General\Requirement\Infrastructure\Ui\Http\Controller\GetRequirementController;

class RequirementController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGet($id)
    {
        return (new GetRequirementController())($id);
    }
}
