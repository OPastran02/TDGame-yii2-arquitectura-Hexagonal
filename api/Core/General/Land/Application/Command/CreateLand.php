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
use Ramsey\Uuid\Uuid;

final class CreateLand
{
    private ILandRepository $repository;
    private IObjetoRepository $objRepository;

    public function __construct(ILandRepository $repository,IObjetoRepository $objRepository){
        $this->repository = $repository;
        $this->objRepository = $objRepository;
    }

    public function __invoke(string $landId): Land
    {
        $name = '[{"id": 1, "text": "nombre"}]';
        $description = '[{"id": 1, "text": "descripcion"}]';
        $color = "FFFFFF";

        $obj = (new CreateObjeto($this->objRepository))($objetoId,$name,$description,$color);
        var_dump($obj);
        exit();

        $arr=[];
        $arr['id'] = $landId;
        $arr['height']=40;
        $arr['weight']=40;
        $arr['code']= (new EmptyGridCreator($arr['height'],$arr['weight']))();
        $arr['order']=0;
        $arr['idObject']=0;
        $arr['available']=1;


        return $this->repository->create($arr);
    }
}