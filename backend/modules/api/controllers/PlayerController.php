<?php

namespace backend\modules\api\controllers;

use api\Core\Player\Player\Infrastructure\Ui\Http\Controller\{
    CreatePlayerController,
    GetPlayerController,
    AddExperienceController
};
use Yii;

class PlayerController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionCreate()
    {
        $data = Yii::$app->request->getBodyParams();
        return (new CreatePlayerController())($data['nickname'],$data['message']);
    }

    public function actionGet($id)
    {
        return (new GetPlayerController())($id);
    }

    public function actionAddExperience()
    {
        $data = Yii::$app->request->getBodyParams();
        return (new AddExperienceController())($data['id'],$data['newExperience']);
    }
}
