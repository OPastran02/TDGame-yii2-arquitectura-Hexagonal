<?php

declare(strict_types=1);

namespace api\Core\General\Object\Application\Query;

use api\Core\General\Object\Domain\Objeto;
use api\Core\General\Object\Domain\Repository\IObjetoRepository;

class GetObjetoByIdHandler
{
    private IObjetoRepository $repository;

    public function __construct(IObjetoRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $id): ?Objeto
    {
        $hero = $this->repository->getbyId($id);
        return $hero;
    }
}