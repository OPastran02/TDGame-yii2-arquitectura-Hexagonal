<?php

namespace backend\modules\api\controllers;

use api\Core\Guild\Guild\Infrastructure\Ui\Http\Controller\{
    CreateGuildController,
    GetGuildController,
    AddExperienceController
};
use Yii;

class GuildController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionCreate()
    {
        return (new CreateGuildController())();
    }

    public function actionGet($id)
    {
        return (new GetGuildController())($id);
    }

    public function actionAddExperience()
    {
        $data = Yii::$app->request->getBodyParams();
        return (new AddExperienceController())($data['id'],$data['newExperience']);
    }
}
