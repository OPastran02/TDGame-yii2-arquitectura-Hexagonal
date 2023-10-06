<?php

namespace backend\modules\api\controllers;

use api\Core\Guild\Title\Infrastructure\Ui\Http\Controller\GetGuildTitleController;

class GuildTitleController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGet($id)
    {
        return (new GetGuildTitleController())($id);
    }
}
