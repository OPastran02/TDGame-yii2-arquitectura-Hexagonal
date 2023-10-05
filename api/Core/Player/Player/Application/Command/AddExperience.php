<?php   

declare(strict_types=1);

namespace api\Core\Player\Player\Application\Command;

use api\Core\Player\Player\Domain\{
    Player,
    Repository\IPlayerRepository
};

use api\Core\Player\Player\Application\Query\GetPlayer;
use api\Core\Player\Player\Application\Helpers\CalculateExperience;

final class AddExperience
{
    private IPlayerRepository $repository;
    private GetPlayer $getPlayer;

    public function __construct(IPlayerRepository $repository){
        $this->repository = $repository;
        $this->getPlayer = new GetPlayer($repository);
    }

    public function __invoke($playerId, $newExperience): Player
    {
        $arr = ($this->getPlayer)($playerId)->toPrimitives();
        $newValues= (new CalculateExperience($arr["level"], $arr["experience"],$newExperience))();
        $arr["experience"] = $newValues["experience"];
        $arr["level"] = $newValues["level"];
        return $this->repository->addExperience($arr);
    }
}