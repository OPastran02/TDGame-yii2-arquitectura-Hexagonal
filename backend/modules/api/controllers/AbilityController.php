<?php

namespace backend\modules\api\controllers;

use yii\web\Response;
use yii\helpers\Json; // Asegúrate de importar el uso de la clase Json
use Yii;

use api\Core\Hero\Ability\Infrastructure\Ui\Http\Controller\GetAbilityByIdController;

class AbilityController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGet($id)
    {
        return (new GetAbilityByIdController())($id);
    }
}
