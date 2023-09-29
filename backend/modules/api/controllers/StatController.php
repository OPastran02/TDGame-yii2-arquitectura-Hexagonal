<?php

namespace backend\modules\api\controllers;

use api\Core\General\Stat\Infrastructure\Ui\Http\Controller\{
    GetStatByIdController,
    SaveStatController
};
use Ramsey\Uuid\Uuid;

class StatController extends \yii\web\Controller
{

    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGet($id)
    {
        return (new GetStatByIdController())($id);
    }

    public function actionSave()
    {
        $id=Uuid::uuid4()->toString();
        $rarity=1;
        return (new SaveStatController())($id,$rarity);
    }


}
