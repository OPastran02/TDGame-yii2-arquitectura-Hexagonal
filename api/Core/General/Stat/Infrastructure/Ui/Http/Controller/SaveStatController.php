<?php

declare(strict_types=1);

namespace api\Core\General\Stat\Infrastructure\Ui\Http\Controller;

use Ramsey\Uuid\Uuid;
use yii\helpers\Json;
use yii\web\Response;
use Yii;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use api\Core\General\Stat\Domain\Stat; 
use api\Core\General\Stat\Domain\Repository\IStatRepository;
use api\Core\General\Stat\Infrastructure\Persistence\ActiveRecord\StatRepositoryActiveRecord;
use api\Core\General\Stat\Application\Command\SaveStatHandler;


class SaveStatController
{
    private SaveStatHandler $handler;

    public function __construct()
    { 
        $repository = new StatRepositoryActiveRecord();
        $this->handler = new SaveStatHandler($repository);
    }

    public function __invoke($arr)
    {    
        $arr['id']=Uuid::uuid4()->toString();
        $arr['created_at']=null;
        $arr['updated_at']=null;
        $arr['created_by']=null;
        $arr['updated_by']=null;

        $object = ($this->handler)($arr);

        return $response;
    }

}  
