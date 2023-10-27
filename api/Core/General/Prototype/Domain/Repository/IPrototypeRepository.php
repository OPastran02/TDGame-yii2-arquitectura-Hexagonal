<?php   

namespace api\Core\General\Prototype\Domain\Repository;

use api\Core\General\Prototype\Domain\{
    Prototype,
};

interface IPrototypeRepository
{   
    public function getByCriteria(int $rarity, int $type, int $race): ?Prototype;
}