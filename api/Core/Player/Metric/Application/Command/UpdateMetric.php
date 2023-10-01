<?php

declare(strict_types=1);

namespace api\Core\Player\Metric\Application\Command;

use api\Core\Player\Metric\Domain\{
    Metric,
    Repository\IMetricRepository
};
use api\Core\Player\Metric\Application\Query\GetMetric;

class UpdateMetric
{
    private IMetricRepository $repository;
    private GetMetric $getMetric;

    public function __construct(IMetricRepository $repository)
    {
        $this->repository = $repository;
        $this->getMetric = new GetMetric($repository);
    }
 
    public function __invoke(
        string $walletId,
        int $win,
        int $timePlayed,
        int $maxPoint,
        int $damageDealt,
        int $landsDestroyed,
        int $mobskilled
    ): ?Metric
    {
        $arr = ($this->getMetric)($walletId)->toPrimitives();

        if($win == 1) $arr['win'] += 1;
        if($win == 0) $arr['loss'] += 1;

        $arr['handicap']=$arr['win'] - $arr['loss'];     
        $arr['timePlayed'] += $timePlayed;       
        ($arr['maxPoints'] > $maxPoint) ? $arr['maxPoints'] : $maxPoint;     
        $arr['damageDealt'] += $damageDealt;        
        $arr['landsDestroyed'] += $landsDestroyed;           
        $arr['mobskilled'] += $mobskilled; 
        
        return $this->repository->update($arr);
    }
}