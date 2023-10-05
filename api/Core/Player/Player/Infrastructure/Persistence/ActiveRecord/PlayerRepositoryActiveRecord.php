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
use api\Core\General\Land\Domain\Land;
use api\Core\General\Object\Domain\Objeto;

use api\Core\General\Object\Infrastructure\Persistence\ActiveRecord\ObjetoRepositoryActiveRecord;

class PlayerRepositoryActiveRecord implements IPlayerRepository
{
    public function get(string $playerId): ?Player
    {
        $objeto = new ObjetoRepositoryActiveRecord();

        $model = Model::find()
            ->with('wallet')
            ->with('avatar.object')
            ->with('metric')
            ->with('status')
            ->with('land.object')
            ->where(['id' => $playerId])
            ->one();

        if (!$model) return null;
        $objAvatar = Objeto::fromPrimitives(...$model["avatar"]["object"]);
        $objLand = Objeto::fromPrimitives(...$model["land"]["object"]);
        
        $wallet = Wallet::fromPrimitives(...$model->wallet->getAttributes());
        $avatar = Avatar::fromPrimitives(           
            $model->avatar->getAttributes()["id"],
            $model->avatar->getAttributes()["nickname"],
            $model->avatar->getAttributes()["message"],
            $model->avatar->getAttributes()["idObject"],
            $model->avatar->getAttributes()["available"],
            $objAvatar
        );  
        $metric = Metric::fromPrimitives(...$model["metric"]["attributes"]);
        $status = Status::fromPrimitives(...$model["status"]["attributes"]);

        $land = Land::fromPrimitives(
            $model->land->getAttributes()["id"],
            $model->land->getAttributes()["height"],
            $model->land->getAttributes()["weight"],
            $model->land->getAttributes()["gridMap"],
            $model->land->getAttributes()["order"],
            $model->land->getAttributes()["idObject"],
            $model->land->getAttributes()["chat"],
            $model->land->getAttributes()["available"],
            $objLand
        );

        return Player::fromPrimitives(
            $model['id'],              
            $model['idwallet'],        
            $model['idavatar'],        
            $model['idmetrics'], 
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
        if ($model->save()){
            return $this->get($model["attributes"]["id"]);
        }else{
            var_dump($model->getErrors());
            exit();
        } 
    }
}
