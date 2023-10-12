<?php

declare(strict_types=1);

namespace api\Core\Chapter\Instance\Application\Command;

use api\Core\Chapter\Instance\Domain\{
    InstanceChapter,
    InstanceChapters,
    Repository\IInstanceChapterRepository
};
use Ramsey\Uuid\Uuid;
use api\Core\Chapter\Instance\Application\Query\GetInstanceChapterByChapter;

class UpdateInstanceChapter
{
    private IInstanceChapterRepository $repository;
    private GetInstanceChapterByChapter $getInstanceChapter;
    public function __construct(IInstanceChapterRepository $repository){
        $this->repository = $repository;
        $this->getInstanceChapter = new GetInstanceChapterByChapter($repository);
    }

    public function __invoke($playerId, $chapterId, $win, $stars): InstanceChapter
    {  
        $arr = ($this->getInstanceChapter)($playerId, $chapterId, $win, $stars)->toPrimitives();
        
        if($win==1){
            $arr['finished']=1;
            $arr['amountOfFinished'] = $arr['amountOfFinished'] + 1;
            $arr['maxStars'] = ($arr['maxStars'] < $stars)? $stars : $arr['maxStars'];
        }

        return $this->repository->updateChapter($arr);
    }

}