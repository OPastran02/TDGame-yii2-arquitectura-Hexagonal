<?php

declare(strict_types=1);

namespace api\Core\Guild\Stash\Application\Command;

use api\Core\Guild\Stash\Domain\{
    Stash,
    Repository\IStashRepository
};
use api\Core\Guild\Stash\Application\Query\GetStash;

class AddResources
{
    private IStashRepository $repository;
    private GetStash $getStash;

    public function __construct(IStashRepository $repository)
    {
        $this->repository = $repository;
        $this->getStash = new GetStash($repository);
    }
 
    public function __invoke($stashId,$type,$value): ?Stash
    {
        $arr = ($this->getStash)($stashId)->toPrimitives();
        $arr[$type] += $value;
        return $this->repository->addResources($arr);
    }
}