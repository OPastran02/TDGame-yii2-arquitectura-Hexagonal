<?php

namespace backend\modules\api\controllers;

use api\Core\General\Prototype\Infrastructure\Ui\Http\Controller\{
    GetPrototypeController,
};
use Yii;

class PrototypeController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGetByCriteria()
    {
        $data = Yii::$app->request->getBodyParams();
        return (new AddExperienceController())($data['id'],$data['newExperience']);
    }

}
