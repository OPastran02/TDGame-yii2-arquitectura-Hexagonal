<?php   

namespace api\Core\Conquer\Instance\Domain\Repository;

use api\Core\Conquer\Instance\Domain\InstanceConquer;
use api\Core\Conquer\Instance\Domain\InstanceConquers;

interface IInstanceConquerRepository
{
    /*
    *what can i do with a World?
    *just get, mandatory
    */
    
    public function getbyId(int $id): ?InstanceConquer;


}