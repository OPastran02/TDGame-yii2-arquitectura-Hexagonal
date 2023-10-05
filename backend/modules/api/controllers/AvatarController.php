<?php

namespace backend\modules\api\controllers;

use yii\web\Response;
use yii\helpers\Json; // Asegúrate de importar el uso de la clase Json
use Yii;

use api\Core\Player\Avatar\Infrastructure\Ui\Http\Controller\{
    CreateAvatarController,
    GetAvatarController
};

class AvatarController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;
    
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGet($id)
    {
        return (new GetAvatarController())($id);
    }

    public function actionCreate()
    {
        $data = Yii::$app->request->getBodyParams();
        return (new CreateAvatarController())($data["nickname"],$data["message"]);
    }
}
