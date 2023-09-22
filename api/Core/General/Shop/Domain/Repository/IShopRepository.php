<?php   

namespace api\Core\General\Shop\Domain\Repository;

use api\Core\General\Shop\Domain\Shop;

interface IShopRepository
{
    /*
    *what can i do with a Shop?
    *just get, mandatory
    */
    
    public function getbyId(int $id): ?Shop;


}