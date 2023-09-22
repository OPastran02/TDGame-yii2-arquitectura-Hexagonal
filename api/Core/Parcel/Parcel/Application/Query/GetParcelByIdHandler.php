<?php

declare(strict_types=1);

namespace api\Core\Parcel\Parcel\Application\Query;

use api\Core\Parcel\Parcel\Domain\Parcel;
use api\Core\Parcel\Parcel\Domain\Repository\IParcelRepository;

class GetParcelByIdHandler
{
    private IParcelRepository $repository;

    public function __construct(IParcelRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $id): ?Parcel
    {
        $obj = $this->repository->getbyId($id);
        return $obj;
    }
}