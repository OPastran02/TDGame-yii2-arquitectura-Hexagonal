<?php   

namespace api\Core\General\Membership\Domain\Repository;

use api\Core\General\Membership\Domain\Membership;
use api\Core\General\Membership\Domain\Memberships;

interface IMembershipRepository
{
    /*
    *what can i do with a Membership?
    *just get, mandatory
    */
    
    public function getbyId(int $id): ?Membership;


}