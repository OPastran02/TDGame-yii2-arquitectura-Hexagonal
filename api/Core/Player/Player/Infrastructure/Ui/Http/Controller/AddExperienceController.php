<?php

declare(strict_types=1);

namespace api\Core\Player\Player\Infrastructure\Ui\Http\Controller;

use api\Core\Player\Player\Domain\{
    Player,
    Repository\IPlayerRepository
}; 
use api\Core\Player\Player\Infrastructure\Persistence\ActiveRecord\PlayerRepositoryActiveRecord;
use api\Core\Player\Player\Application\Command\AddExperience;
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
        $playerrepository = new PlayerRepositoryActiveRecord();
        $this->handler = new AddExperience($playerrepository);
    }

    public function __invoke($playerId, $newExperience)
    {    
        $player = ($this->handler)($playerId,$newExperience);

        Yii::$app->response->format = Response::FORMAT_JSON;
        Yii::$app->response->data = $player->toPrimitives();
        return Yii::$app->response;
    }

}  
