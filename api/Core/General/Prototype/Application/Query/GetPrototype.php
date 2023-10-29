<?php

declare(strict_types=1);

namespace api\Core\General\Prototype\Application\Query;

use api\Core\General\Prototype\Domain\{
    Prototype,
    Repository\IPrototypeRepository
};

class GetPrototype 
{
    private IPrototypeRepository $repository;

    public function __construct(IPrototypeRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $rarity, int $type, int $race): ?Prototype
    {
        return $this->repository->getByCriteria($rarity, $type, $race);
    }
}