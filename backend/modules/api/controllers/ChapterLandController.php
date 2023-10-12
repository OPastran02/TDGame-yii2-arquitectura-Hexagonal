<?php

namespace backend\modules\api\controllers;

use api\Core\Chapter\Mob\Infrastructure\Ui\Http\Controller\GetChapterLandController;

class ChapterLandController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGet($id)
    {
        return (new GetChapterLandController())($id);
    }
}
