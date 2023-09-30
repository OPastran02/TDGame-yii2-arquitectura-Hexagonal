<?php

namespace backend\modules\api\controllers;
use Ramsey\Uuid\Uuid;
use yii\web\Response;
use yii\helpers\Json; // Asegúrate de importar el uso de la clase Json
use Yii;

use api\Core\Player\Status\Infrastructure\Ui\Http\Controller\{
    GetStatusController,
    CreateStatusController,
    UpdateBattlePassController,
    UpdateUltraPassController,
    AddAdsController,
    UpdateDateController
};

class StatusController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGet($id)
    {
        return (new GetStatusController())($id);
    }

    public function actionCreate($id)
    {
        return (new CreateStatusController())($id);
    }

    public function actionUpdateBattlePass($id)
    {
        return (new UpdateBattlePassController())($id);
    }

    public function actionUpdateUltraPass($id)
    {
        return (new UpdateUltraPassController())($id);
    }

    public function actionAddAds($id)
    {
        return (new AddAdsController())($id);
    }

    public function actionUpdateDate($id)
    {
        return (new UpdateDateController())($id);
    }
}
