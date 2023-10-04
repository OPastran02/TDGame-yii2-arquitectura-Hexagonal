<?php   

declare(strict_types=1);

namespace api\Core\General\Object\Application\Command;

use api\Core\General\Object\Domain\{
    Objeto,
    Repository\IObjetoRepository
};
use Ramsey\Uuid\Uuid;

final class CreateObjeto
{
    private IObjetoRepository $repository;

    public function __construct(IObjetoRepository $repository){
        $this->repository = $repository;
    }

    public function __invoke(string $type): Objeto
    {
        $arr=[];
        $arr['id'] = Uuid::uuid4()->toString();
        $arr['name'] = '[{"id": 1, "text": "nombre"}]';
        $arr['description'] = '[{"id": 1, "text": "descripcion"}]';
        $arr['color'] = "FFFFFF";
        $arr['model'] = "MOD-".$type."-0000-0000";
        $arr['image'] = "IMG-".$type."-0000-0000";
        $arr['available'] = 1;

        return $this->repository->create($arr);
    }
}