<?php

declare(strict_types=1);

namespace api\Core\Player\Avatar\Infrastructure\Ui\Http\Controller;

use api\Core\Player\Avatar\Domain\{
    Avatar,
    Repository\IAvatarRepository
}; 
use api\Core\Player\Avatar\Infrastructure\Persistence\ActiveRecord\AvatarRepositoryActiveRecord;
use api\Core\General\Object\Infrastructure\Persistence\ActiveRecord\ObjetoRepositoryActiveRecord;
use api\Core\Player\Avatar\Application\Command\CreateAvatar;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class CreateAvatarController
{
    private CreateAvatar $handler;

    public function __construct()
    { 
        $repository = new AvatarRepositoryActiveRecord();
        $objetoRepository = new ObjetoRepositoryActiveRecord();
        $this->handler = new CreateAvatar($repository, $objetoRepository);
    }

    public function __invoke(string $nickname, string $message)
    {    
        $obj = ($this->handler)($nickname,$message);

        Yii::$app->response->format = Response::FORMAT_JSON;
        Yii::$app->response->data = $obj->toPrimitives();
        return Yii::$app->response;
    }

}  
