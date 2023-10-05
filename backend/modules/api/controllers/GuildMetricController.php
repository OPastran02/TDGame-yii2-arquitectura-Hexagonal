<?php

namespace backend\modules\api\controllers;

use api\Core\Guild\Metric\Infrastructure\Ui\Http\Controller\{
    GetGuildMetricController,
    CreateGuildMetricController,
    UpdateGuildMetricController
};
use Yii;

class GuildMetricController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGet($id)
    {
        return (new GetGuildMetricController())($id);
    }

    public function actionCreate()
    {
        return (new CreateGuildMetricController())();
    }

    public function actionUpdate()
    {
        $data = Yii::$app->request->getBodyParams();
        return (new UpdateGuildMetricController())(
            $data['id'],
            $data['win'],
            $data['timePlayed'],
            $data['maxPoints'],
            $data['damageDealt'],
            $data['landsDestroyed'],
            $data['mobskilled'],
        );
    }
}
