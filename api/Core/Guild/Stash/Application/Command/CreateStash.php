<?php

declare(strict_types=1);

namespace api\Core\Guild\Stash\Application\Command;

use api\Core\Guild\Stash\Domain\{
    Stash,
    Repository\IStashRepository
};
use Ramsey\Uuid\Uuid;

class CreateStash
{
    private IStashRepository $repository;

    public function __construct(IStashRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(): ?Stash
    {
        $arr=[];
        $arr['id'] = Uuid::uuid4()->toString();  
        $arr['wood'] = 0;
        $arr['steel'] = 0;
        $arr['farm'] = 0;
        $arr['available'] = 1;
        return $this->repository->create($arr);
    }
}