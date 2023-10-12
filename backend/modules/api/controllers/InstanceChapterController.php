<?php

namespace backend\modules\api\controllers;

use api\Core\Chapter\Instance\Infrastructure\Ui\Http\Controller\{
    GetInstanceChapterbyIdPlayerController,
    CreateInstanceController,
    UpdateInstanceController
};
use Yii;

class InstanceChapterController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGet($id)
    {
        return (new GetInstanceChapterbyIdPlayerController())($id);
    }

    public function actionCreateInstanceChapter()
    {
        $data = Yii::$app->request->getBodyParams();
        return (new CreateInstanceController())($data['idPlayer'],$data['idChapter']);
    }

    public function actionUpdateInstanceChapter()
    {
        $data = Yii::$app->request->getBodyParams();
        return (new UpdateInstanceController())($data['idPlayer'],$data['idChapter'],$data['win'],$data['stars']);
    }
}
