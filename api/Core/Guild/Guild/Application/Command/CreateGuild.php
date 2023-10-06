<?php

declare(strict_types=1);

namespace api\Core\Guild\Guild\Application\Command;

use api\Core\Guild\Guild\Domain\{
    Guild,
    Repository\IGuildRepository
};
use api\Core\General\Object\Domain\Repository\IObjetoRepository;
use api\Core\Guild\Stash\Domain\Repository\IStashRepository;
use api\Core\Guild\Metric\Domain\Repository\IGuildMetricRepository;
use api\Core\Guild\Stash\Application\Command\CreateStash;
use api\Core\Guild\Metric\Application\Command\CreateMetric;
use api\Core\General\Object\Application\Command\CreateObjeto;
use Ramsey\Uuid\Uuid;

class CreateGuild
{
    private IGuildRepository $guildRepository;
    private IObjetoRepository $objetoRepository;
    private IStashRepository $stashRepository;
    private IGuildMetricRepository $metricRepository;

    public function __construct(
        IGuildRepository $guildRepository,
        IObjetoRepository $objetoRepository,
        IStashRepository $stashRepository,
        IGuildMetricRepository $metricRepository
    )
    {
        $this->guildRepository = $guildRepository;
        $this->objetoRepository = $objetoRepository;
        $this->stashRepository = $stashRepository;
        $this->metricRepository = $metricRepository;
    }
 
    public function __invoke(): ?Guild
    {
        $objeto = (new CreateObjeto($this->objetoRepository))("GUIL");
        $stash = (new CreateStash($this->stashRepository))();
        $metric = (new CreateMetric($this->metricRepository))();

        $arr=[];
        $arr['id'] = Uuid::uuid4()->toString();
        $arr['idObject']=$objeto->id()->value();   
        $arr['idstash']=$stash->id()->value();   
        $arr['idmetrics']=$metric->id()->value();   
        $arr['maxMembers']=20;
        $arr['experience']=0;
        $arr['level']=0;
        $arr['available']=1;
        return $this->repository->create($arr);
    }
}