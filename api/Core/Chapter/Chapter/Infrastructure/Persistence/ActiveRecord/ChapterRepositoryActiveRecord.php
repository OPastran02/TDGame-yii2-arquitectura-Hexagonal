<?php

declare(strict_types=1);

namespace api\Core\Chapter\Chapter\Infrastructure\Persistence\ActiveRecord;

use api\Core\Chapter\Chapter\Domain\{
    Chapter,
    Repository\IChapterRepository
};
use common\models\Chapter as Model;
use api\Core\General\Object\Domain\Objeto;
use api\Core\General\Reward\Domain\Reward;

class ChapterRepositoryActiveRecord implements IChapterRepository
{
    public function get(int $chapterId): ?Chapter
    {
        $model = Model::find()
            ->with('object') 
            ->with('reward.object') 
            ->where(['id' => $chapterId])
            ->one();

        if (!$model) return null;


        $objeto = Objeto::fromPrimitives(...$model["object"]["attributes"]);
        $objetoReward = Objeto::fromPrimitives(...$model["reward"]["object"]);
        $reward = Reward::fromPrimitives(
            $model->reward->getAttributes()["id"],
            $model->reward->getAttributes()["idObject"],
            $model->reward->getAttributes()["bronze"],
            $model->reward->getAttributes()["silver"],
            $model->reward->getAttributes()["gold"],
            $model->reward->getAttributes()["crystal"],
            $model->reward->getAttributes()["quantity"],
            $model->reward->getAttributes()["available"],
            $objetoReward
        );

        return Chapter::fromPrimitives(
            $model['id'],
            $model['idObject'],
            $model['idReward'],
            $model['available'],
            $objeto,
            $reward
        );
    }
}
