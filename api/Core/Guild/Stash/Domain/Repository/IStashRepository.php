<?php   

namespace api\Core\Guild\Stash\Domain\Repository;

use api\Core\Guild\Stash\Domain\Stash;

interface IStashRepository
{
    public function get(string $stashId): ?Stash;
    public function create($stash): ?Stash;
    public function addResources($stash): ?Stash;
}