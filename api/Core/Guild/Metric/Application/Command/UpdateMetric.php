<?php

declare(strict_types=1);

namespace api\Core\Guild\Metric\Application\Command;

use api\Core\Guild\Metric\Domain\{
    GuildMetric,
    Repository\IGuildMetricRepository
};
use api\Core\Guild\Metric\Application\Query\GetGuildMetric;

class UpdateMetric
{
    private IGuildMetricRepository $repository;
    private GetGuildMetric $getGuildMetric;

    public function __construct(IGuildMetricRepository $repository)
    {
        $this->repository = $repository;
        $this->getGuildMetric = new GetGuildMetric($repository);
    }
 
    public function __invoke(
        string $guildMetricId,
        int $win,
        int $timePlayed,
        int $maxPoint,
        int $damageDealt,
        int $landsDestroyed,
        int $mobskilled
    ): ?GuildMetric
    {
        $arr = ($this->getGuildMetric)($guildMetricId)->toPrimitives();

        if($win == 1) $arr['win'] += 1;
        if($win == 0) $arr['loss'] += 1;

        $arr['handicap']=$arr['win'] - $arr['loss'];     
        $arr['timePlayed'] += $timePlayed;       
        ($arr['maxPoints'] > $maxPoint) ? $arr['maxPoints'] : $maxPoint;     
        $arr['damageDealt'] += $damageDealt;        
        $arr['landsDestroyed'] += $landsDestroyed;           
        $arr['mobsKilled'] += $mobskilled; 

        return $this->repository->update($arr);
    }
}