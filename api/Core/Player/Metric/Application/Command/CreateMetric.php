<?php

declare(strict_types=1);

namespace api\Core\Player\Metric\Application\Command;

use api\Core\Player\Metric\Domain\{
    Metric,
    Repository\IMetricRepository
};
use Ramsey\Uuid\Uuid;

class CreateMetric
{
    private IMetricRepository $repository;

    public function __construct(IMetricRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(): ?Metric
    {
        $arr = [];
        $arr['id']              =Uuid::uuid4()->toString();
        $arr['win']             =0;
        $arr['loss']            =0; 
        $arr['handicap']        =0;     
        $arr['timePlayed']      =0;       
        $arr['maxPoints']       =0;      
        $arr['damageDealt']     =0;        
        $arr['landsDestroyed']  =0;           
        $arr['mobskilled']      =0;       
        $arr['available']       =1;   
        
        return $this->repository->create($arr);
    }
}