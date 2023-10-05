<?php   

declare(strict_types=1);

namespace api\Core\Player\Player\Application\Command;

use api\Core\Player\Player\Domain\{
    Player,
    Repository\IPlayerRepository
};
use api\Core\Player\Wallet\Domain\Repository\IWalletRepository;
use api\Core\Player\Avatar\Domain\Repository\IAvatarRepository;
use api\Core\Player\Metric\Domain\Repository\IMetricRepository;
use api\Core\Player\Status\Domain\Repository\IStatusRepository;
use api\Core\General\Land\Domain\Repository\ILandRepository;
use api\Core\General\Object\Domain\Repository\IObjetoRepository;

use api\Core\Player\Wallet\Application\Command\CreateWallet;
use api\Core\Player\Avatar\Application\Command\CreateAvatar;
use api\Core\Player\Metric\Application\Command\CreateMetric;
use api\Core\Player\Status\Application\Command\CreateStatus;
use api\Core\General\Land\Application\Command\CreateLand;

use Ramsey\Uuid\Uuid;

final class CreatePlayer
{
    private IPlayerRepository $playerRepository;
    private IWalletRepository $walletRepository;
    private IAvatarRepository $avatarRepository;
    private IMetricRepository $metricRepository;
    private IStatusRepository $statusRepository;
    private IObjetoRepository $objetoRepository;
    private ILandRepository $landRepository;


    public function __construct(
        IPlayerRepository $playerRepository,
        IWalletRepository $walletRepository,
        IAvatarRepository $avatarRepository,
        IMetricRepository $metricRepository,
        IStatusRepository $statusRepository,
        ILandRepository   $landRepository,
        IObjetoRepository $objetoRepository
    ){
        $this->playerRepository = $playerRepository;
        $this->walletRepository = $walletRepository;
        $this->avatarRepository = $avatarRepository;
        $this->metricRepository = $metricRepository;
        $this->statusRepository = $statusRepository;
        $this->landRepository = $landRepository;
        $this->objetoRepository = $objetoRepository;
    }

    public function __invoke($nickname,$message): Player
    { 
        $wallet = (new CreateWallet($this->walletRepository))();
        $avatar = (new CreateAvatar($this->avatarRepository,$this->objetoRepository))($nickname,$message);
        $metric = (new CreateMetric($this->metricRepository))();
        $status = (new CreateStatus($this->statusRepository))();
        $land = (new CreateLand($this->landRepository,$this->objetoRepository))();

        $arr=[];
        $arr['id'] = Uuid::uuid4()->toString();              
        $arr['idwallet'] = $wallet->id()->value();        
        $arr['idavatar'] = $avatar->id()->value();       
        $arr['idmetrics'] = $metric->id()->value();    
        $arr['idstatus'] = $status->id()->value();           
        $arr['idland'] = $land->id()->value();            
        $arr['experience'] = 0;      
        $arr['level'] = 1;          
        $arr['available'] = 1;      

        return $this->playerRepository->create($arr);
    }
}