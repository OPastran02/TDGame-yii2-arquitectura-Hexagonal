<?php

namespace backend\modules\api\controllers;

use api\Core\Guild\Stash\Infrastructure\Ui\Http\Controller\{
    AddResourcesController,
    CreateStashController,
    GetStashController
};
use Yii;

class StashController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGet($id)
    {
        return (new GetStashController)($id);
    }

    public function actionCreate()
    {
        return (new CreateStashController())();
    }

    public function actionAddResources()
    {
        $data = Yii::$app->request->getBodyParams();
        return (new AddResourcesController())($data['id'],$data['type'],$data['value']);
    }

}
