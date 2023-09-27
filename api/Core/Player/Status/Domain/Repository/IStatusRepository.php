<?php   

namespace api\Core\Player\Status\Domain\Repository;

use api\Core\Player\Status\Domain\Status;
use api\Core\Player\Status\Domain\Statuses;

interface IStatusRepository
{
    public function getbyId(string $id): ?Status;
}