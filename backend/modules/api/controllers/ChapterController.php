<?php

namespace backend\modules\api\controllers;

use api\Core\Chapter\Chapter\Infrastructure\Ui\Http\Controller\{
    GetChapterController,
};

class ChapterController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGet($id)
    {
        return (new GetChapterController())($id);
    }
}
