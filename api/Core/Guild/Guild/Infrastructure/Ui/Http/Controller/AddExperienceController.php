<?php

declare(strict_types=1);

namespace api\Core\Guild\Guild\Infrastructure\Ui\Http\Controller;

use api\Core\Guild\Guild\Domain\{
    Guild,
    Repository\IGuildRepository
};
use api\Core\Guild\Guild\Infrastructure\Persistence\ActiveRecord\GuildRepositoryActiveRecord;
use api\Core\Guild\Guild\Application\Command\AddExperience;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class AddExperienceController
{
    private AddExperience $handler;

    public function __construct()
    { 
        $repository = new GuildRepositoryActiveRecord();
        $this->handler = new AddExperience($repository);
    }

    public function __invoke($guildId, $newExperience)
    {    
        $guild = ($this->handler)($guildId, $newExperience);

        Yii::$app->response->format = Response::FORMAT_JSON;
        Yii::$app->response->data = $guild->toPrimitives();
        return Yii::$app->response;
    }
}  