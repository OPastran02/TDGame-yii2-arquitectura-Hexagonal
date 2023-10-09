<?php

declare(strict_types=1);

namespace api\Core\Chapter\Instance\Application\Command;

use api\Core\Chapter\Instance\Domain\{
    InstanceChapter,
    InstanceChapters,
    Repository\IInstanceChapterRepository
};
use Ramsey\Uuid\Uuid;

class CreateInstanceChapter
{
    private IInstanceChapterRepository $repository;

    public function __construct(IInstanceChapterRepository $repository){
        $this->repository = $repository;
    }

    public function __invoke($player, $guild): array
    {  
        $arr=[];
        $arr['id'] = 4;
        $arr['idPlayer']=$player;
        $arr['idChapter']=$guild;
        $arr['finished']=0;
        $arr['amountOfFinished']=0;
        $arr['maxStars']=0;
        $arr['available']=1;

        return $this->repository->create($arr);
    }

}