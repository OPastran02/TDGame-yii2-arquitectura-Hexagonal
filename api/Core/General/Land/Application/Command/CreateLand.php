<?php   

declare(strict_types=1);

namespace api\Core\General\Land\Application\Command;

use api\Core\General\Land\Domain\{
    Land,
    Repository\ILandWriteRepository
};
use api\Core\General\Object\Domain\{
    Repository\IObjetoRepository
};
use api\Core\General\Land\Application\Helpers\EmptyGridCreator;
use api\Core\General\Object\Application\Command\CreateObjeto;
use Ramsey\Uuid\Uuid;

final class CreateLand 
{
    private ILandWriteRepository $repository;
    private IObjetoRepository $objRepository;

    public function __construct(ILandWriteRepository $repository, IObjetoRepository $objRepository){
        $this->repository = $repository;
        $this->objRepository = $objRepository;
    }

    public function __invoke(): Land
    { 
        $height=2;
        $weight=2;

        $objeto = (new CreateObjeto($this->objRepository))("LAND");
        $grid = (new EmptyGridCreator($height,$weight))();
        
        $arr=[];
        $arr['id'] = Uuid::uuid4()->toString();
        $arr['height']=$height;
        $arr['weight']=$weight;
        $arr['gridMap']=$grid;
        $arr['order']=0;
        $arr['idObject']=$objeto->id()->value();
        $arr['chat']="moriras";
        $arr['available']=1;

        return $this->repository->create($arr);
    }
}