<?php   

namespace api\Core\Parcel\Parcel\Domain\Repository;

use api\Core\Parcel\Parcel\Domain\Parcel;

interface IParcelRepository
{
    /*
    *what can i do with a rarity?
    *just get, mandatory
    */
    
    public function getbyId(int $id): ?Parcel;


}