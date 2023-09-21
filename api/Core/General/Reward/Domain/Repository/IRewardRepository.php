<?php   

namespace api\Core\General\Reward\Domain\Repository;

use api\Core\General\Reward\Domain\Reward;
use api\Core\General\Reward\Domain\Rewards;

interface IRewardRepository
{
    /*
    *what can i do with an objeto?
    *just get it by id, because its the visual parameters of another entity.
    *
    *get by Available?
    */
    
    public function getbyId(int $id): ?Reward;


}