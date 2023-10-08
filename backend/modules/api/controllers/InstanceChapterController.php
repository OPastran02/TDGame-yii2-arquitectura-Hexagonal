<?php

namespace backend\modules\api\controllers;

use api\Core\Chapter\Instance\Infrastructure\Ui\Http\Controller\{
    GetInstanceChapterbyIdPlayerController,
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

}
