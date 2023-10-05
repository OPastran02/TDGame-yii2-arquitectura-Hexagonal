<?php

declare(strict_types=1);

namespace api\Core\Player\Player\Infrastructure\Ui\Http\Controller;

use api\Core\Player\Player\Domain\{
    Player,
    Repository\IPlayerRepository
}; 
use api\Core\Player\Player\Infrastructure\Persistence\ActiveRecord\PlayerRepositoryActiveRecord;
use api\Core\Player\Wallet\Infrastructure\Persistence\ActiveRecord\WalletRepositoryActiveRecord;
use api\Core\Player\Avatar\Infrastructure\Persistence\ActiveRecord\AvatarRepositoryActiveRecord;
use api\Core\Player\Metric\Infrastructure\Persistence\ActiveRecord\MetricRepositoryActiveRecord;
use api\Core\Player\Status\Infrastructure\Persistence\ActiveRecord\StatusRepositoryActiveRecord;
use api\Core\General\Land\Infrastructure\Persistence\ActiveRecord\LandRepositoryActiveRecord;
use api\Core\General\Object\Infrastructure\Persistence\ActiveRecord\ObjetoRepositoryActiveRecord;

use api\Core\Player\Player\Application\Command\CreatePlayer;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

class CreatePlayerController
{
    private CreatePlayer $handler;

    public function __construct()
    { 
        $playerrepository = new PlayerRepositoryActiveRecord();
        $walletrepository = new WalletRepositoryActiveRecord();
        $avatarrepository = new AvatarRepositoryActiveRecord();
        $metricrepository = new MetricRepositoryActiveRecord();
        $statusrepository = new StatusRepositoryActiveRecord();
        $landrepository = new LandRepositoryActiveRecord();
        $objetoRepository = new ObjetoRepositoryActiveRecord();

        $this->handler = new CreatePlayer(
            $playerrepository, 
            $walletrepository, 
            $avatarrepository, 
            $metricrepository, 
            $statusrepository, 
            $landrepository,
            $objetoRepository
        );
    }

    public function __invoke($nickname,$message)
    {    
        $player = ($this->handler)($nickname,$message);

        Yii::$app->response->format = Response::FORMAT_JSON;
        Yii::$app->response->data = $player->toPrimitives();
        return Yii::$app->response;
    }

}  
