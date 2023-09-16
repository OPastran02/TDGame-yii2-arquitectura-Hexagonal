<?php

namespace backend\modules\api\controllers;
use yii\web\Response;
use yii\helpers\Json; // Asegúrate de importar el uso de la clase Json
use Yii;

use api\Core\General\Object\Infrastructure\Ui\Http\Controller\GetObjetoByIdController;

class ObjetoController extends \yii\web\Controller
{
    public function actionIndex()
    {
        echo 'hola mundo';
        exit();
        return $this->render('index');
    }

    public function actionGetObject($id)
    {
        return (new GetObjetoByIdController())($id);
    }


}
