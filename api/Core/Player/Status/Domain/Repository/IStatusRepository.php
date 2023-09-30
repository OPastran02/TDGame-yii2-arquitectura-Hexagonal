<?php   

namespace api\Core\Player\Status\Domain\Repository;

use api\Core\Player\Status\Domain\Status;

interface IStatusRepository
{
    public function get(string $statusId): ?Status;
    public function create($status): Status;
    public function updateBattlePass($status): ?Status;
    public function updateUltraPass($status): ?Status;
    public function addAds($status): ?Status;
    public function updateDate($status): ?Status;
}