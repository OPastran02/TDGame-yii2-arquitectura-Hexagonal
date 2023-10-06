<?php

declare(strict_types=1);

namespace api\Core\Guild\Guild\Infrastructure\Ui\Http\Controller;

use api\Core\Guild\Guild\Domain\{
    Guild,
    Repository\IGuildRepository
};
use api\Core\Guild\Guild\Infrastructure\Persistence\ActiveRecord\GuildRepositoryActiveRecord;
use api\Core\Guild\Metric\Infrastructure\Persistence\ActiveRecord\GuildMetricRepositoryActiveRecord;
use api\Core\Guild\Stash\Infrastructure\Persistence\ActiveRecord\StashRepositoryActiveRecord;
use api\Core\General\Object\Infrastructure\Persistence\ActiveRecord\ObjetoRepositoryActiveRecord;

use api\Core\Guild\Guild\Application\Command\CreateGuild;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class CreateGuildController
{
    private CreateGuild $handler;

    public function __construct()
    { 
        $guildRepository = new GuildRepositoryActiveRecord();
        $objetoRepository = new ObjetoRepositoryActiveRecord();
        $stashRepository = new StashRepositoryActiveRecord();
        $metricRepository = new GuildMetricRepositoryActiveRecord();

        $this->handler = new CreateGuild(
            $guildRepository, 
            $objetoRepository, 
            $stashRepository, 
            $metricRepository, 
        );
    }

    public function __invoke()
    {    
        $guild = ($this->handler)();

        Yii::$app->response->format = Response::FORMAT_JSON;
        Yii::$app->response->data = $guild->toPrimitives();
        return Yii::$app->response;
    }
}  