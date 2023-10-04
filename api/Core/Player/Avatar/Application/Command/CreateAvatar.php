<?php   

declare(strict_types=1);

namespace api\Core\Player\Avatar\Application\Command;

use api\Core\Player\Avatar\Domain\{
    Avatar,
    Repository\IAvatarRepository
};
use api\Core\General\Object\Domain\{
    Repository\IObjetoRepository
};
use api\Core\General\Object\Application\Command\CreateObjeto;
use Ramsey\Uuid\Uuid;

final class CreateAvatar
{
    private IAvatarRepository $repository;
    private IObjetoRepository $objrepository;

    public function __construct(IAvatarRepository $repository,IObjetoRepository $objrepository){
        $this->repository = $repository;
        $this->objrepository = $objrepository;
    }

    public function __invoke(string $nickname, string $message): Avatar
    {
        $objeto = (new CreateObjeto($this->objrepository))("PLAY");

        $arr=[];
        $arr['id'] = Uuid::uuid4()->toString();
        $arr['nickname'] = $nickname;
        $arr['message'] = $message;
        $arr['idObject'] = $objeto->id()->value();
        $arr['available'] = 1;

        return $this->repository->create($arr);
    }
}