<?php

declare(strict_types=1);

namespace api\Core\General\Shop\Application\Query;

use api\Core\General\Shop\Domain\Shop;
use api\Core\General\Shop\Domain\Repository\IShopRepository;

class GetShopByIdHandler
{
    private IShopRepository $repository;

    public function __construct(IShopRepository $repository)
    {
        $this->repository = $repository;
    }
 
    public function __invoke(int $id): ?Shop
    {
        $hero = $this->repository->getbyId($id);
        return $hero;
    }
}