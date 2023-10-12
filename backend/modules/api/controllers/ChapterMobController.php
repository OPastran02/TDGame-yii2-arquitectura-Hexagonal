<?php

namespace backend\modules\api\controllers;
use api\Core\Chapter\Mob\Infrastructure\Ui\Http\Controller\GetChapterMobByLandIdController;

class ChapterMobController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGet($id)
    {
        return (new GetChapterMobByLandIdController())($id);
    }

}
