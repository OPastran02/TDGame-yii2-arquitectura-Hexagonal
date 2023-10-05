<?php

declare(strict_types=1);

namespace api\Core\Player\Player\Infrastructure\Persistence\ActiveRecord;

use api\Core\Player\Player\Domain\{
    Player,
    Repository\IPlayerRepository
};
use common\models\Player as Model;
use api\Core\Player\Wallet\Domain\Wallet;
use api\Core\Player\Avatar\Domain\Avatar;
use api\Core\Player\Metric\Domain\Metric;
use api\Core\Player\Status\Domain\Status;
use api\Core\Player\Land\Domain\Land;

class PlayerRepositoryActiveRecord implements IPlayerRepository
{
    public function get(string $playerId): ?Player
    {
        var_dump($playerId);
        exit();
        $model = Model::find()
            ->with('wallet')
            ->with('avatar')
            ->with('metric')
            ->with('status')
            ->with('land')
            ->where(['id' => $playerId])
            ->one();

        if (!$model) return null;

        $wallet = Wallet::fromPrimitives(...$model["wallet"]["attributes"]);
        $avatar = Avatar::fromPrimitives(...$model["avatar"]["attributes"]);
        $metric = Metric::fromPrimitives(...$model["metric"]["attributes"]);
        $status = Status::fromPrimitives(...$model["status"]["attributes"]);
        $land = Land::fromPrimitives(...$model["land"]["attributes"]);

        return Player::fromPrimitives(
            $model['id'],              
            $model['idwallet'],        
            $model['idavatar'],        
            $model['idmetrics'],       
            $model['idrankedMetrics'], 
            $model['idstatus'],        
            $model['idland'],          
            $model['experience'],      
            $model['level'],           
            $model['available'],  
            $wallet,
            $avatar,
            $metric,
            $status,   
            $land
        );
    }

    public function create($arr): Player
    {
        $model = new Model();
        $model->attributes = $arr;
        var_dump($model);
        exit();
        if ($model->save()){
            return $this->get($model["attributes"]["id"]);
        }else{
            var_dump($model->getErrors());
            exit();
        } 
    }
}
