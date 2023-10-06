<?php

declare(strict_types=1);

namespace api\Core\Guild\Guild\Application\Command;

use api\Core\Guild\Guild\Domain\{
    Guild,
    Repository\IGuildRepository
};
use api\Core\Guild\Guild\Application\Query\GetGuild;
use api\Core\Guild\Guild\Application\Helpers\CalculateExperience;

final class AddExperience
{
    private IGuildRepository $repository;
    private GetGuild $getGuild;

    public function __construct(IGuildRepository $repository){
        $this->repository = $repository;
        $this->getGuild = new GetGuild($repository);
    }

    public function __invoke($guildId, $newExperience): Player
    {
        $arr = ($this->getGuild)($guildId)->toPrimitives();
        $newValues= (new CalculateExperience($arr["level"], $arr["experience"],$newExperience))();
        $arr["experience"] = $newValues["experience"];
        $arr["level"] = $newValues["level"];
        return $this->repository->addExperience($arr);
    }
}