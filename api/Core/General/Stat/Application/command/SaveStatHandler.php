<?php   

declare(strict_types=1);

namespace api\Core\General\Stat\Application\Command;

use api\Core\General\Stat\Domain\Repository\IStatRepository;
use api\Core\General\Stat\Domain\Stat;


use DateTime;

final class SaveStatHandler
{
    private IStatRepository $repository;

    public function __construct(IStatRepository $repository){
        $this->repository = $repository;
    }

    public function __invoke($arr){
        //var_dump($arr);
        //exit();
        $id=$this->repository->save($arr);
        return $id;
    }
}