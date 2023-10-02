<?php   

declare(strict_types=1);

namespace api\Core\General\Land\Application\Command;

use api\Core\General\Land\Domain\{
    Land,
    Repository\ILandRepository
};
use api\Core\General\Object\Domain\{
    Repository\IObjetoRepository
};
use api\Core\General\Land\Application\Helper\EmptyGridCreator;
use api\Core\General\Object\Application\Command\CreateObjeto;
use Ramsey\Uuid\Uuid;

final class CreateLand
{
    private ILandRepository $repository;

    public function __construct(ILandRepository $repository){
        $this->repository = $repository;
    }

    public function __invoke(string $landId): Land
    {
        $objetoId = Uuid::uuid4()->toString();
        $name = '[{"id": 1, "text": "nombre"}]';
        $description = '[{"id": 1, "text": "descripcion"}]';
        $color = "FFFFFF";

        $obj = ($this->handler)($objetoId,$name,$description,$color);
        var_dump($obj);
        exit();

        $arr=[];
        $arr['id'] = $landId;
        $arr['height']=40;
        $arr['weight']=40;
        $arr['code']= (new EmptyGridCreator($arr['height'],$arr['weight']))();
        $arr['order']=0;
        $arr['idObject']= (new CreateObjeto);
        $arr['available']=1;


        return $this->repository->create($arr);
    }
}