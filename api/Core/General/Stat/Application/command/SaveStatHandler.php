<?php   

declare(strict_types=1);

namespace api\Core\General\Stat\Application\Command;

use api\Core\General\Stat\Domain\Repository\IStatRepository;
use api\Core\General\Stat\Domain\Stat;
use api\Core\General\Stat\Application\Helpers\PowerLevelGenerator;
use api\Core\General\Stat\Application\Helpers\StatRandomizer;
use api\Core\General\Stat\Application\Helpers\IncrementRandomizer;

use DateTime;

final class SaveStatHandler
{
    private IStatRepository $repository;
    private StatRandomizer $statRandomizer;
    private IncrementRandomizer $incrementRandomizer;

    public function __construct(
        IStatRepository $repository, 
        StatRandomizer $statRandomizer,
        IncrementRandomizer $incrementRandomizer,
        )
    {
        $this->repository = $repository;
        $this->statRandomizer = $statRandomizer;
        $this->incrementRandomizer = $incrementRandomizer;

    }

    public function __invoke($id,$rarity): Stat
    {
        $arr["id"] = $id;
        $arr["attack"] = $this->statRandomizer->__invoke($rarity);
        $arr["defense"] = $this->statRandomizer->__invoke($rarity);
        $arr["towerAttack"] = $this->statRandomizer->__invoke($rarity);
        $arr["towerDefense"] = $this->statRandomizer->__invoke($rarity);
        $arr["hp"] = $this->statRandomizer->__invoke($rarity);
        $arr["accuracy"] = $this->statRandomizer->__invoke($rarity);
        $arr["speed"] = $this->statRandomizer->__invoke($rarity);
        $arr["farming"] = $this->statRandomizer->__invoke($rarity);
        $arr["steeling"] = $this->statRandomizer->__invoke($rarity);
        $arr["wooding"] = $this->statRandomizer->__invoke($rarity);
        $arr["incAttack"] = $this->incrementRandomizer->__invoke();
        $arr["incDefense"] = $this->incrementRandomizer->__invoke();
        $arr["inchp"] = $this->incrementRandomizer->__invoke();
        $arr["incTowerAttack"] = $this->incrementRandomizer->__invoke();
        $arr["incTowerDefense"] = $this->incrementRandomizer->__invoke();
        $arr["incAccuracy"] = $this->incrementRandomizer->__invoke();
        $arr["incSpeed"] = $this->incrementRandomizer->__invoke();
        $arr["incFarming"] = $this->incrementRandomizer->__invoke();
        $arr["incSteeling"] = $this->incrementRandomizer->__invoke();
        $arr["incWooding"] = $this->incrementRandomizer->__invoke();
        $arr["powerLevel"] = (new PowerLevelGenerator())($arr);
        $arr["available"] = 1;

        $id=$this->repository->save($arr);
        return $id;
    }
}