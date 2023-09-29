<?php

declare(strict_types=1);

namespace api\Core\General\Object\Application\Query;

use api\Core\General\Object\Domain\{
    Objeto,
    Repository\IObjetoRepository
};

class GetObjeto 
{
    private IObjetoRepository $repository;

    public function __construct(IObjetoRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $objetoId): ?Objeto
    {
        return $this->repository->get($objetoId);
    }
}